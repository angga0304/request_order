<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Item;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{

    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'item_code' => 'ATK0001',
            'name' => 'AMPLOP A COKLAT JAYA',
            'warehouse_id' => 1,
            'stock' => 17,
            'unit_name' => 'Pak',
        ];
    }
}
