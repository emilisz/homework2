<?php

declare(strict_types=1);

namespace App\Kata3;

use App\Kata2\FreeShippingCalculator;
use App\Kata2\PriceCalculator;
use App\Kata4\ShippingInterface;
use JetBrains\PhpStorm\Pure;

class DiscountStrategy
{
    public function __construct(private bool $isTuesday= false)
    {
    }

    #[Pure] public function selectShippingStrategy(ShippingInterface $shipping = null): PriceCalculator|FreeShippingCalculator
    {
        if ($this->isTuesday){
            return new FreeShippingCalculator();
        }
        return new PriceCalculator($shipping);
    }
}
