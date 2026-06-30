<?php

namespace Database\Seeders;

use App\Models\UserTender;
use Illuminate\Database\Seeder;

class UserTenderSeeder extends Seeder
{
    public function run(): void
    {
        UserTender::firstOrCreate(
            ['id' => 'd0000000-0000-0000-0000-000000000001'],
            [
                'user_id'   => 'a0000000-0000-0000-0000-000000000001',
                'tender_id' => 'b0000000-0000-0000-0000-000000000001',
            ]
        );

        UserTender::firstOrCreate(
            ['id' => 'd0000000-0000-0000-0000-000000000002'],
            [
                'user_id'   => 'a0000000-0000-0000-0000-000000000002',
                'tender_id' => 'b0000000-0000-0000-0000-000000000001',
            ]
        );

        UserTender::firstOrCreate(
            ['id' => 'd0000000-0000-0000-0000-000000000003'],
            [
                'user_id'   => 'a0000000-0000-0000-0000-000000000001',
                'tender_id' => 'b0000000-0000-0000-0000-000000000002',
            ]
        );
    }
}