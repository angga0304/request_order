<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Item::factory()->create([
            'item_code' => 'ATK0001',
            'name' => 'AMPLOP A COKLAT JAYA',
            'warehouse_id' => 1,
            'stock' => 17,
            'unit_name' => 'Pak',
        ]);
        \App\Models\Item::factory()->create([
            'item_code' => 'ATK0002',
            'name' => 'AMPLOP B COKLAT JAYA',
            'warehouse_id' => 1,
            'stock' => 32,
            'unit_name' => 'Pak',
        ]);
        \App\Models\Item::factory()->create([
            'item_code' => 'ATK0003',
            'name' => 'AMPLOP C COKLAT JAYA',
            'warehouse_id' => 1,
            'stock' => 9,
            'unit_name' => 'Pak',
        ]);
        \App\Models\Item::factory()->create([
            'item_code' => 'ATK0004',
            'name' => 'Kain merah',
            'warehouse_id' => 2,
            'stock' => 20,
            'unit_name' => 'Ton',
        ]);
        \App\Models\Item::factory()->create([
            'item_code' => 'ATK0005',
            'name' => 'Kain putih',
            'warehouse_id' => 2,
            'stock' => 22,
            'unit_name' => 'Ton',
        ]);
        \App\Models\Item::factory()->create([
            'item_code' => 'ATK0006',
            'name' => 'Kain putih polos',
            'warehouse_id' => 2,
            'stock' => 25,
            'unit_name' => 'Ton',
        ]);
        \App\Models\Item::factory()->create([
            'item_code' => 'ATK0007',
            'name' => 'Kain sutra hijau',
            'warehouse_id' => 2,
            'stock' => 40,
            'unit_name' => 'Ton',
        ]);
        \App\Models\Item::factory()->create([
            'item_code' => 'ATK0008',
            'name' => 'Kain biru berpola',
            'warehouse_id' => 2,
            'stock' => 31,
            'unit_name' => 'Ton',
        ]);
        \App\Models\Item::factory()->create([
            'item_code' => 'ATK0009',
            'name' => 'Kain batik',
            'warehouse_id' => 3,
            'stock' => 25,
            'unit_name' => 'Ton',
        ]);
        \App\Models\Item::factory()->create([
            'item_code' => 'ATK0010',
            'name' => 'Stemple cap',
            'warehouse_id' => 4,
            'stock' => 20,
            'unit_name' => 'biji',
        ]);
    }
}
