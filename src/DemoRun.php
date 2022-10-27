<?php

declare(strict_types=1);

namespace App;

use App\Kata1\Discount;
use App\Kata1\Price;
use App\Kata1\Shipping;
use App\Kata2\PriceCalculatorInterface;
use App\Kata3\DiscountStrategy;
use App\Kata4\DpdShippingProvider;

class DemoRun
{
    private bool $isTuesday = false;

    public function kata1()
    {
        // shipping = 8;
        // discount = 20;
        // new Price(100);

//        dekoratorius*
        $result = new Shipping(8, new Discount(20, new Price(100)));
        return $result->cost();
//        return 88;
    }

    public function kata2(PriceCalculatorInterface $calculator)
    {
        // shipping = 8;
        // discount = 20;
        // new Price(100);

        return $calculator->calculate(100, 20, 8);
//        return 88;
    }

    public function kata3()
    {
        // shipping = 8;
        // discount = 20;
        // new Price(100);

        $chooseBetweenShipping = new DiscountStrategy(self::isTuesday());
        return $chooseBetweenShipping->selectShippingStrategy()->calculate(100, 20, 8);
//        return 80;
    }

    public function kata4()
    {
        // shipping = 8;
        // discount = 20;
        // new Price(100);

        $chooseBetweenShipping = new DiscountStrategy(self::isTuesday());
        return $chooseBetweenShipping->selectShippingStrategy(new DpdShippingProvider())->calculate(100, 20, 8);
//        return 84;
    }

    /**
     * @return bool
     */
    public function isTuesday(): bool
    {
        return $this->isTuesday;
    }

    /**
     * @param bool $isTuesday
     */
    public function setIsTuesday(bool $isTuesday): void
    {
        $this->isTuesday = $isTuesday;
    }
}
