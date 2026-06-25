<?php

namespace App\Models;

use App\Contracts\Repositories\UserTenderRepository;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserTender extends Model implements UserTenderRepository
{
    use HasUuids;

    protected $table = 'UserTenders';

    protected $fillable = ['user_id', 'tender_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tender(): BelongsTo
    {
        return $this->belongsTo(Tender::class);
    }
}