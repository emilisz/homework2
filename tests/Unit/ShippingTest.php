<?php declare(strict_types=1);


namespace Test\Unit;
use App\Kata1\Price;
use App\Kata1\Shipping;
use App\Kata4\DpdShippingProvider;
use PHPUnit\Framework\TestCase;

class ShippingTest extends TestCase
{
    private const DUMMY_PRICE = 100;

    public function testDpdShippingProviderCalculatesOurCostCorrect(): void
    {
        $this->assertEquals((float)4, (new DpdShippingProvider())->ourCost());
    }

    public function testShippingCostCalculatesCorrect(): void
    {
        $actual = new Shipping(10, (new Price(self::DUMMY_PRICE)));
        $this->assertEquals((float)110, $actual->cost());
    }


    /**
     * @dataProvider shippingDataProvider
     */
    public function testShippingClassReturnsCorrectResult(float $a, float $b, float $c): void
    {
        $actual = new Shipping($a, (new Price($b)));
        $this->assertEquals($c, $actual->cost());
    }



    public function shippingDataProvider(): \Generator
    {
        yield 'First test' => [
            'a' => 0,
            'b' => 0,
            'c' => 0,
        ];

        yield 'Second test' => [
            'a' => 5,
            'b' => 80,
            'c' => 85,
        ];

        yield 'Third test' => [
            'a' => 5,
            'b' => 100,
            'c' => 105,
        ];
    }
}