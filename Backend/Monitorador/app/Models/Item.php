<?php

namespace App\Models;

use App\Contracts\Repositories\ItemRepository;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model implements ItemRepository
{
    use HasUuids;

    protected $table = 'Items';

    protected $fillable = ['url', 'tender_id', 'last_checked_at', 'active'];

    protected $casts = ['active' => 'boolean'];

    public function tender(): BelongsTo
    {
        return $this->belongsTo(Tender::class);
    }

    public function userItems(): HasMany
    {
        return $this->hasMany(UserItem::class);
    }
}