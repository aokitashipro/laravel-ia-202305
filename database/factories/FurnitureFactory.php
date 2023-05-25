<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Furniture>
 */
class FurnitureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->realTextBetween(5, 20),
            'prefecture' => fake()->prefecture(),
            'address' => fake()->city(),
            'review' => fake()->numberBetween(1,5),
            'image' => 'https://picsum.photos/200/300',
            'price' => fake()->randomNumber(5),
            'is_visible' => fake()->boolean(),
            'created_at' => fake()->dateTime(),
        ];
    }
}
