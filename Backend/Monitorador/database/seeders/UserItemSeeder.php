<?php

namespace Database\Seeders;

use App\Models\UserItem;
use Illuminate\Database\Seeder;

class UserItemSeeder extends Seeder
{
    public function run(): void
    {
        UserItem::firstOrCreate(
            ['id' => 'e0000000-0000-0000-0000-000000000001'],
            [
                'user_id' => 'a0000000-0000-0000-0000-000000000001',
                'item_id' => 'c0000000-0000-0000-0000-000000000001',
            ]
        );

        UserItem::firstOrCreate(
            ['id' => 'e0000000-0000-0000-0000-000000000002'],
            [
                'user_id' => 'a0000000-0000-0000-0000-000000000002',
                'item_id' => 'c0000000-0000-0000-0000-000000000001',
            ]
        );

        UserItem::firstOrCreate(
            ['id' => 'e0000000-0000-0000-0000-000000000003'],
            [
                'user_id' => 'a0000000-0000-0000-0000-000000000001',
                'item_id' => 'c0000000-0000-0000-0000-000000000002',
            ]
        );
    }
}