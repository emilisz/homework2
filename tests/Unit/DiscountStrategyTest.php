<?php

namespace Test\Unit;

use App\Kata1\Price;
use App\Kata3\DiscountStrategy;
use PHPUnit\Framework\TestCase;

class DiscountStrategyTest extends TestCase
{

    public function test_selects_free_shipping_if_tuesday(): void
    {

        $calculator = (new DiscountStrategy(true))->selectShippingStrategy();

        $this->assertEquals(80, $calculator->calculate(new Price(100), 20, 8));
    }

    public function test_selects_no_free_shipping_if_not_tuesday(): void
    {

        $calculator = (new DiscountStrategy(false))->selectShippingStrategy();

        $this->assertEquals(88, $calculator->calculate(new Price(100), 20, 8));
    }
}