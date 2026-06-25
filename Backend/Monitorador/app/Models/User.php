<?php

namespace App\Models;

use App\Contracts\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model implements UserRepository
{
    use HasUuids;

    protected $table = 'Users';

    protected $fillable = [];

    public function userItems(): HasMany
    {
        return $this->hasMany(UserItem::class);
    }

    public function userTenders(): HasMany
    {
        return $this->hasMany(UserTender::class);
    }
}