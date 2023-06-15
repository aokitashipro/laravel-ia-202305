<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            // 'category_id' => fake()->numberBetween(1, 10),
            'category_id' => Category::inRandomOrder()->first(),
            'price' => fake()->numberBetween(1000, 50000),
            'amount' => fake()->numberBetween(1, 30),
            'created_at' => fake()->dateTimeBetween('-5 years', new Carbon(), 'Asia/Tokyo'),
            'updated_at' => fake()->dateTimeBetween('-5 years', new Carbon(), 'Asia/Tokyo'),
        ];
    }
}
