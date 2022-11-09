<?php

namespace Tests\Unit;

use App\Models\ProductInventory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductInventoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_find_product_inventory_with_highest_stock()
    {
        $quantities = collect([20, 5, 40]);
        $quantities->each(fn ($quantity) => ProductInventory::factory()->create(compact('quantity')));

        $inventoryWithHighestStock = ProductInventory::findWithHighestStock();

        $this->assertSame(40, $inventoryWithHighestStock->quantity);
    }

    /** @test */
    public function it_should_find_product_inventory_with_highest_stock_where_there_is_duplicate()
    {
        // Given
        ProductInventory::factory()->create(['quantity' => 20]);
        $expected = ProductInventory::factory()->create(['quantity' => 40]);
        ProductInventory::factory()->create(['quantity' => 40]);
        // When
        $inventoryWithHighestStock = ProductInventory::findWithHighestStock();
        // Then
        $this->assertSame($expected->id, $inventoryWithHighestStock->id);
    }

    /** @test */
    public function it_should_throw_exception_in_case_of_empty_inventories()
    {
        $this->expectException(ModelNotFoundException::class);

        ProductInventory::findWithHighestStock();
    }
}
