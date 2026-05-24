<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'category' => $this->faker->randomElement(['electronics', 'clothing', 'home', 'beauty', 'other']),
            'status' => $this->faker->randomElement(['active', 'inactive', 'out_of_stock']),
            ];
    }
}
