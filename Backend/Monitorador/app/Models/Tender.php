<?php

namespace App\Models;

use App\Contracts\Repositories\TenderRepository;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tender extends Model implements TenderRepository
{
    use HasUuids;

    protected $table = 'Tenders';

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
}