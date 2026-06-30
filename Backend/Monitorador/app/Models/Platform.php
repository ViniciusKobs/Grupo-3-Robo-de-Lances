<?php

namespace App\Models;

use App\Contracts\Repositories\PlatformRepository;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Platform extends Model implements PlatformRepository
{
    use HasUuids;

    protected $table = 'platforms';

    protected $fillable = ['domain'];

    public function tenders(): HasMany
    {
        return $this->hasMany(Tender::class);
    }
}
