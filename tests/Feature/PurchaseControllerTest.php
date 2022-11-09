<?php

namespace Tests\Feature;

use App\Services\PaymentGateway;
use Mockery;
use Tests\TestCase;

class PurchaseControllerTest extends TestCase
{
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
}
