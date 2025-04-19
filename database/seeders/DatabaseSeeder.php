<?php

namespace Database\Seeders;

use App\Models\DetailRequest;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            DepartmentSeeder::class,
            WarehouseSeeder::class,
            ItemSeeder::class,
            EmployeeSeeder::class,
            RequestSeeder::class,
            DetailRequestSeeder::class,
        ]);
    }
}
