<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\DetailRequest::factory()->create([
            'request_id' => 1,
            'item_id' => 1,
            'qty' => 12,
            'notes' => 'catatan'
        ]);
        \App\Models\DetailRequest::factory()->create([
            'request_id' => 2,
            'item_id' => 1,
            'qty' => 4,
            'notes' => ''
        ]);
        \App\Models\DetailRequest::factory()->create([
            'request_id' => 3,
            'item_id' => 1,
            'qty' => 1,
            'notes' => ''
        ]);
        \App\Models\DetailRequest::factory()->create([
            'request_id' => 4,
            'item_id' => 1,
            'qty' => 1,
            'notes' => ''
        ]);
        \App\Models\DetailRequest::factory()->create([
            'request_id' => 5,
            'item_id' => 1,
            'qty' => 1,
            'notes' => ''
        ]);
        \App\Models\DetailRequest::factory()->create([
            'request_id' => 6,
            'item_id' => 1,
            'qty' => 1,
            'notes' => ''
        ]);
        \App\Models\DetailRequest::factory()->create([
            'request_id' => 7,
            'item_id' => 1,
            'qty' => 1,
            'notes' => ''
        ]);
        \App\Models\DetailRequest::factory()->create([
            'request_id' => 8,
            'item_id' => 1,
            'qty' => 1,
            'notes' => ''
        ]);
        \App\Models\DetailRequest::factory()->create([
            'request_id' => 9,
            'item_id' => 1,
            'qty' => 1,
            'notes' => ''
        ]);
        \App\Models\DetailRequest::factory()->create([
            'request_id' => 10,
            'item_id' => 1,
            'qty' => 2,
            'notes' => ''
        ]);
    }
}
