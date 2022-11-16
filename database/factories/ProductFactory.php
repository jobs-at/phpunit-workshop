<?php

namespace Database\Factories;

use App\Models\ProductInventory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductInventory>
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
            'name' => 'TEST',
            'product_inventory_id' => ProductInventory::factory()->create(),
            'price' => $this->faker->numberBetween(5, 100)
        ];
    }
}
