<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Employee::factory()->create([
            'nik' => '001.059.00588',
            'name' => 'Aam Suherman',
            'departments_id' => 1,
        ]);
        \App\Models\Employee::factory()->create([
            'nik' => '001.059.00592',
            'name' => 'Angga Tresna',
            'departments_id' => 1,
        ]);
        \App\Models\Employee::factory()->create([
            'nik' => '001.059.00598',
            'name' => 'Iskandar muda',
            'departments_id' => 1,
        ]);
        \App\Models\Employee::factory()->create([
            'nik' => '001.059.00578',
            'name' => 'Euis sukaesih',
            'departments_id' => 1,
        ]);
        \App\Models\Employee::factory()->create([
            'nik' => '002.059.00588',
            'name' => 'Risma bahari',
            'departments_id' => 2,
        ]);
        \App\Models\Employee::factory()->create([
            'nik' => '002.059.00581',
            'name' => 'Ridwan hanif',
            'departments_id' => 2,
        ]);
        \App\Models\Employee::factory()->create([
            'nik' => '003.059.00588',
            'name' => 'Tanti soraya',
            'departments_id' => 3,
        ]);
        \App\Models\Employee::factory()->create([
            'nik' => '003.059.00488',
            'name' => 'Umi setiawan',
            'departments_id' => 3,
        ]);
        \App\Models\Employee::factory()->create([
            'nik' => '004.059.00588',
            'name' => 'Rudi bagja',
            'departments_id' => 4,
        ]);
        \App\Models\Employee::factory()->create([
            'nik' => '004.059.00588',
            'name' => 'Hendra imam',
            'departments_id' => 4,
        ]);
    }
}
