<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Warehouse::factory()->create([
            'name' => 'Gudang utama',
            'location_code' => 'L1-R1A',
            'notes' => '',
        ]);
        \App\Models\Warehouse::factory()->create([
            'name' => 'Gudang kedua',
            'location_code' => 'L1-R1B',
            'notes' => 'di gedung kedua',
        ]);
        \App\Models\Warehouse::factory()->create([
            'name' => 'Gudang ketiga',
            'location_code' => 'L2-R1A',
            'notes' => 'sebrang gedung utama',
        ]);
        \App\Models\Warehouse::factory()->create([
            'name' => 'Gudang keempat',
            'location_code' => 'L2-R2A',
            'notes' => 'belakang gudang utama',
        ]);
        \App\Models\Warehouse::factory()->create([
            'name' => 'Gudang kelima',
            'location_code' => 'L2-R2B',
            'notes' => '',
        ]);
        \App\Models\Warehouse::factory()->create([
            'name' => 'Gudang keenam',
            'location_code' => 'L2-R3A',
            'notes' => '',
        ]);
        \App\Models\Warehouse::factory()->create([
            'name' => 'Gudang ketujuh',
            'location_code' => 'L3-R1A',
            'notes' => '',
        ]);
        \App\Models\Warehouse::factory()->create([
            'name' => 'Gudang kedelapan',
            'location_code' => 'L3-R1B',
            'notes' => 'gedung utama di yogyakarta',
        ]);
        \App\Models\Warehouse::factory()->create([
            'name' => 'Gudang kesembilan',
            'location_code' => 'L3-R2A',
            'notes' => '',
        ]);
        \App\Models\Warehouse::factory()->create([
            'name' => 'Gudang kesepuluh',
            'location_code' => 'L3-R3A',
            'notes' => '',
        ]);
    }
}
