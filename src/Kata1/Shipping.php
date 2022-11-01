<?php

declare(strict_types=1);

namespace App\Kata1;

class Shipping implements CostInterface
{
    public function __construct(private float $shipping, private CostInterface $baseCost, $shippingProvider = null)
    {
    }
    public function cost(): float
    {
        return $this->shipping + $this->baseCost->cost();
    }
}
