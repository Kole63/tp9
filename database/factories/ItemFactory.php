<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Supplier;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $suppliersID = Supplier::get()->pluck('id');
        return [
            'title' => fake()->realText(20),
            'description' => fake()->realText(200),
            'price' => fake()->randomFloat(2, 0.01, 99.99),
            'supplier_id' => fake()->randomElement($suppliersID)
        ];
    }
}
