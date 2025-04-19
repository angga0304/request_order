<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DetailRequest;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailRequest>
 */
class DetailRequestFactory extends Factory
{

    protected $model = DetailRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'request_id' => 2,
            'item_id' => 1,
            'qty' => 4,
            'notes' => ''
        ];
    }
}
