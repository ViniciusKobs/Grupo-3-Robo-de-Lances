<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        Item::firstOrCreate(
            ['id' => 'c0000000-0000-0000-0000-000000000001'],
            [
                'url'             => 'https://www.compras.rs.gov.br/licitacao/1/item/1',
                'tender_id'       => 'b0000000-0000-0000-0000-000000000001',
                'last_checked_at' => now()->subHours(2),
                'active'          => true,
            ]
        );

        Item::firstOrCreate(
            ['id' => 'c0000000-0000-0000-0000-000000000002'],
            [
                'url'             => 'https://www.compras.rs.gov.br/licitacao/1/item/2',
                'tender_id'       => 'b0000000-0000-0000-0000-000000000001',
                'last_checked_at' => now()->subHour(),
                'active'          => true,
            ]
        );

        Item::firstOrCreate(
            ['id' => 'c0000000-0000-0000-0000-000000000003'],
            [
                'url'             => 'https://www.compras.rs.gov.br/licitacao/2/item/1',
                'tender_id'       => 'b0000000-0000-0000-0000-000000000002',
                'last_checked_at' => now()->subMinutes(30),
                'active'          => false,
            ]
        );
    }
}