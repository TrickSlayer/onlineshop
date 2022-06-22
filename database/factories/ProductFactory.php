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
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'content' => $this->faker->paragraph(),
            'active' => random_int(0,1),
            'thumb'=> '/storage/uploads/2022/06/08/04/03/10/Ảnh chụp màn hình 2021-12-07 142140.png',
            'shop_id' => random_int(1,3),
            'category_id' => random_int(1,10),
            'quantity' => random_int(0,1000),
            'price' => random_int(10,21),
            'sale_price' => random_int(5,10),
        ];
    }
}
