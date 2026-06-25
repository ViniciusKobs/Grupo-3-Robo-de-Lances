<?php

namespace App\Models;

use App\Contracts\Repositories\UserItemRepository;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserItem extends Model implements UserItemRepository
{
    use HasUuids;

    protected $table = 'UserItems';

    protected $fillable = ['user_id', 'item_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}