<?php

declare(strict_types=1);

namespace App\Kata2;

use App\Kata1\CostInterface;
use App\Kata1\Discount;
use App\Kata1\Price;
use App\Kata1\Shipping;
use App\Kata4\ShippingInterface;

class PriceCalculator implements PriceCalculatorInterface
{
    public function __construct(private ?ShippingInterface $shipping = null)
    {
    }

    public function calculate(CostInterface $price, float $discount, float $tax): float
    {
        $totalPrice =  new Shipping(!$this->shipping ? $tax : $this->shipping->ourCost(), new Discount($discount, $price));
        return $totalPrice->cost();
    }

}
