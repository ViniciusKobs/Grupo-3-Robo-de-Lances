<?php

namespace Database\Seeders;

use App\Models\Platform;
use App\Models\Tender;
use Illuminate\Database\Seeder;

class TenderSeeder extends Seeder
{
    public function run(): void
    {
        $platform = Platform::first();

        Tender::firstOrCreate(
            ['id' => 'b0000000-0000-0000-0000-000000000001'],
            [
                'url'             => 'https://www.compras.rs.gov.br/licitacao/1',
                'platform_id'     => $platform->id,
                'last_checked_at' => now()->subHours(2),
                'active'          => true,
            ]
        );

        Tender::firstOrCreate(
            ['id' => 'b0000000-0000-0000-0000-000000000002'],
            [
                'url'             => 'https://www.compras.rs.gov.br/licitacao/2',
                'platform_id'     => $platform->id,
                'last_checked_at' => now()->subHour(),
                'active'          => true,
            ]
        );

        Tender::firstOrCreate(
            ['id' => 'b0000000-0000-0000-0000-000000000003'],
            [
                'url'             => 'https://www.compras.rs.gov.br/licitacao/3',
                'platform_id'     => $platform->id,
                'last_checked_at' => now()->subMinutes(10),
                'active'          => false,
            ]
        );
    }
}