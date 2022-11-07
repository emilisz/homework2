<?php

namespace Test\Unit;

use App\Kata1\Price;
use App\Kata3\DiscountStrategy;
use PHPUnit\Framework\TestCase;

class DiscountStrategyTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * **/

    public function testSelectsFreeShippingIfConcreteDay($isTuesday, $result, float $price, float $discount, float $tax): void
    {

        $calculator = (new DiscountStrategy($isTuesday))->selectShippingStrategy();

        $this->assertEquals($result, $calculator->calculate(new Price($price), $discount, $tax));
    }


    public function dataProvider(): \Generator
    {
        yield 'test 1' =>
        [
            'isTuesday' => false,
            'result' => 88,
            'price' => 100,
            'discount' => 20,
            'tax' => 8
        ];

        yield 'test 2' =>
        [
            'isTuesday' => true,
            'result' => 80,
            'price' => 100,
            'discount' => 20,
            'tax' => 8
        ];
    }
}