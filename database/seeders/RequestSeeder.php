<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Request::factory()->create([
            'request_number' => '0000000001',
            'date' => now(),
            'employee_id' => 1,
        ]);
        \App\Models\Request::factory()->create([
            'request_number' => '0000000002',
            'date' => now(),
            'employee_id' => 2,
        ]);
        \App\Models\Request::factory()->create([
            'request_number' => '0000000003',
            'date' => now(),
            'employee_id' => 3,
        ]);
        \App\Models\Request::factory()->create([
            'request_number' => '0000000004',
            'date' => now(),
            'employee_id' => 4,
        ]);
        \App\Models\Request::factory()->create([
            'request_number' => '0000000005',
            'date' => now(),
            'employee_id' => 5,
        ]);
        \App\Models\Request::factory()->create([
            'request_number' => '0000000006',
            'date' => now(),
            'employee_id' => 6,
        ]);
        \App\Models\Request::factory()->create([
            'request_number' => '0000000007',
            'date' => now(),
            'employee_id' => 7,
        ]);
        \App\Models\Request::factory()->create([
            'request_number' => '0000000008',
            'date' => now(),
            'employee_id' => 8,
        ]);
        \App\Models\Request::factory()->create([
            'request_number' => '0000000009',
            'date' => now(),
            'employee_id' => 9,
        ]);
        \App\Models\Request::factory()->create([
            'request_number' => '0000000010',
            'date' => now(),
            'employee_id' => 10,
        ]);
    }
}
