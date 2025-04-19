<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Department::factory()->create([
            'name' => 'Callender',
            'address' => 'Jl. Raya Cimareme No.273, Cimareme, Kec. Ngamprah, Kabupaten Bandung Barat, Jawa Barat 40552',
            'city' => 'Bandung',
        ]);
        \App\Models\Department::factory()->create([
            'name' => 'Percetakan',
            'address' => 'Jl. Raya Cimareme No.272, Cimareme, Kec. Ngamprah, Kabupaten Bandung Barat, Jawa Barat 40552',
            'city' => 'Bandung',
        ]);
        \App\Models\Department::factory()->create([
            'name' => 'Pemasaran',
            'address' => 'Jl. Raya Cimareme No.271, Cimareme, Kec. Ngamprah, Kabupaten Bandung Barat, Jawa Barat 40552',
            'city' => 'Bandung',
        ]);
        \App\Models\Department::factory()->create([
            'name' => 'Pengelolaan',
            'address' => 'Jl. Raya Cimareme No.274, Cimareme, Kec. Ngamprah, Kabupaten Bandung Barat, Jawa Barat 40552',
            'city' => 'Bandung',
        ]);
        \App\Models\Department::factory()->create([
            'name' => 'Pengiriman',
            'address' => 'Jl. Raya Cimareme No.271a, Cimareme, Kec. Ngamprah, Kabupaten Bandung Barat, Jawa Barat 40552',
            'city' => 'Bandung',
        ]);
        \App\Models\Department::factory()->create([
            'name' => 'Keuangan',
            'address' => 'Jl. Raya Cimareme No.273, Cimareme, Kec. Ngamprah, Kabupaten Bandung Barat, Jawa Barat 40552',
            'city' => 'Jakarta',
        ]);
        \App\Models\Department::factory()->create([
            'name' => 'Gudang',
            'address' => 'Jl. Raya Cimareme No.273, Cimareme, Kec. Ngamprah, Kabupaten Bandung Barat, Jawa Barat 40552',
            'city' => 'Surabaya',
        ]);
        \App\Models\Department::factory()->create([
            'name' => 'Pengadaan',
            'address' => 'Jl. Raya Cimareme No.273, Cimareme, Kec. Ngamprah, Kabupaten Bandung Barat, Jawa Barat 40552',
            'city' => 'Yogyakarta',
        ]);
        \App\Models\Department::factory()->create([
            'name' => 'Pemeliharaan',
            'address' => 'Jl. Raya Cimareme No.27p, Cimareme, Kec. Ngamprah, Kabupaten Bandung Barat, Jawa Barat 40552',
            'city' => 'Bandung',
        ]);
        \App\Models\Department::factory()->create([
            'name' => 'Distribusi',
            'address' => 'Jl. Raya Cimareme No.273, Cimareme, Kec. Ngamprah, Kabupaten Bandung Barat, Jawa Barat 40552',
            'city' => 'Kerawang',
        ]);
    }
}
