<?php

declare(strict_types=1);

namespace App\Kata2;

use App\Kata1\CostInterface;
use App\Kata1\Discount;
use App\Kata1\Price;
use App\Kata1\Shipping;

class FreeShippingCalculator implements PriceCalculatorInterface
{
    private const FREE_TAX_RATE = 0;

    public function calculate(CostInterface $price, float $discount, float $tax): float
    {
        $totalPrice =  (new Shipping(self::FREE_TAX_RATE, new Discount($discount, $price)));
        return $totalPrice->cost();
    }

}
