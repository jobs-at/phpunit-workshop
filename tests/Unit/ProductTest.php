<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\ProductInventory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_print_the_most_expensive_product() {
        Product::factory()->create(['price' => 5]);
        Product::factory()->create(['price' => 10]);

        $result = Product::findWithHighestPrice();

        $this->assertEquals(10, $result->price);
    }

    /** @test */
    public function it_should_print_the_most_expensive_product_with_nullable() {
        Product::factory()->create(['price' => null]);
        Product::factory()->create(['price' => 10]);

        $result = Product::findWithHighestPrice();

        $this->assertEquals(10, $result->price);
    }
}
