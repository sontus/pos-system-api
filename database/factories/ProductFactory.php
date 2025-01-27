<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween(100, 1000),
            'sku' => $this->faker->ean13(),
            'category_id' => $this->faker->numberBetween(1, 10),
            'current_stock_quantity' => $this->faker->numberBetween(0, 100),
            'initial_stock_quantity' => $this->faker->numberBetween(0, 100),
        ];
    }
}
