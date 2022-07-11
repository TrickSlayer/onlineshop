<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'user_id' => $this->faker->unique()->numberBetween(1, 3),
            'content' => $this->faker->paragraph(),
            'address' => 'Hà Nội',
            'active' => 1,
        ];
    }
}
