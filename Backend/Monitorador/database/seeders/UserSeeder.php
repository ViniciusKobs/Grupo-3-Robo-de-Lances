<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(['id' => 'a0000000-0000-0000-0000-000000000001']);
        User::firstOrCreate(['id' => 'a0000000-0000-0000-0000-000000000002']);
    }
}
