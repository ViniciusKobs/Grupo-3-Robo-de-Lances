<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    public function run(): void
    {
        Platform::firstOrCreate(
            [
                'domain' => 'https://www.compras.rs.gov.br/',
                'code'   => 0
            ]
        );
    }
}
