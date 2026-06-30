<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PlatformSeeder::class,
            UserSeeder::class,
            TenderSeeder::class,
            ItemSeeder::class,
            UserTenderSeeder::class,
            UserItemSeeder::class,
        ]);
    }
}