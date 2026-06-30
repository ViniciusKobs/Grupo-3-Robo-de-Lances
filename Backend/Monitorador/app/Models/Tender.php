<?php

namespace App\Models;

use App\Contracts\Repositories\TenderRepository;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
use app\Domain\Tender\DTOs\Tender as TenderDTO;

class Tender extends Model implements TenderRepository
{
    use HasUuids;

    protected $table = 'tenders';

    protected $fillable = ['url', 'platform_id', 'last_checked_at', 'active'];

    protected $casts = ['active' => 'boolean'];

    public function platform(): BelongsTo
    {
        return $this->belongsTo(Platform::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function userTenders(): HasMany
    {
        return $this->hasMany(UserTender::class);
    }

    /**
     * Claim the oldest unchecked active tender using a skip-locked queue pattern.
     *
     * Atomically selects the oldest active tender where last_checked_at < NOW() - interval,
     * updates last_checked_at to NOW(), and returns the updated record.
     *
     * @param string $interval PostgreSQL interval string, e.g. '5 minutes', '1 hour'
     * @return self|null
     */
    public function claimNextForProcessing(string $interval = '5 minutes'): ?TenderDTO
    {
        $table = (new self)->getTable();

        $result = DB::selectOne("
            UPDATE $table
            SET last_checked_at = NOW()
            WHERE id = (
                SELECT
                    id
                FROM $table
                WHERE
                    active = true AND
                    (
                        last_checked_at IS NULL OR
                        last_checked_at < NOW() - INTERVAL '$interval'
                    )
                ORDER BY
                    last_checked_at ASC NULLS FIRST
                LIMIT 1
                FOR UPDATE SKIP LOCKED
            )
            RETURNING *
        ");

        if ($result === null) {
            return null;
        }

        $model = self::with(['items', 'userTenders.user'])->find($result->id);

        return TenderDTO::fromArray($model->toArray());
    }

    public function deactivateById(string $id): void
    {
        $this->newQuery()->where('id', $id)->update(['active' => false]);
    }
}
