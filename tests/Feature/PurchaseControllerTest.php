<?php

namespace Tests\Feature;

use App\Facades\Twitter;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use App\Services\PaymentGateway;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class PurchaseControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_check_balance_of_my_credit_card()
    {
        $mockPaymentGateway = Mockery::mock(PaymentGateway::class);
        $this->swap(PaymentGateway::class, $mockPaymentGateway);

        $mockPaymentGateway->shouldReceive('getBalance')->once()->andReturn(100);
        $response = $this->get('/check-balance');

        $response->assertOk();
        $response->assertJson(['balance' => 100]);
    }

    /** @test */
    public function a_user_can_buy_a_product_successfully()
    {
        Twitter::fake();

        // Create a user
        $user = User::factory()->create();
        // Create a product
        $product = Product::factory()->create();

        // Buy the product
        $response = $this->actingAs($user)->post('/purchases', ['product_id' => $product->id, 'quantity' => 1]);

        // Assert that purchase was created
        $response->assertCreated();
        $this->assertDatabaseHas('purchases', [
            'user_id' => $user->id,
            'total_price' => $product->price
        ]);
        $this->assertDatabaseHas('purchase_items', [
            'purchase_id' => Purchase::first()->id,
            'product_id' => $product->id,
            'quantity' => 1
        ]);

        // Assert that user received a notification via Twitter
        Twitter::assertTweetSent();
    }
}
