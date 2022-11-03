<?php declare(strict_types=1);

namespace Test\Unit;
use App\Kata1\Price;
use App\Kata2\PriceCalculator;
use PHPUnit\Framework\TestCase;

class PriceCalculatorTest extends TestCase
{
    /**
     * @dataProvider priceDataProvider
     */
    public function testPriceCalculatorReturnsCorrectResult(float $price, float $discount, float $tax, float $result): void
    {
        $calculator = (new PriceCalculator());
        $this->assertEquals($result, $calculator->calculate(new Price($price), $discount, $tax));
    }



    public function priceDataProvider(): \Generator
    {
        yield 'First test' => [
            'price' => 0,
            'discount' => 0,
            'tax' => 0,
            'result' => 0
        ];

        yield 'Second test' => [
            'price' => 5,
            'discount' => 80,
            'tax' => 5,
            'result' => 6
        ];

        yield 'Third test' => [
            'price' => 50,
            'discount' => 10,
            'tax' => 25,
            'result' => 70
        ];
    }
}