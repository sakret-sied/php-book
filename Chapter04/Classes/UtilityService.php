<?php

namespace Chapter04\Classes;

use Chapter04\Traits\PriceUtilities;
use Chapter04\Traits\TaxTools;

class UtilityService extends Service
{
    use PriceUtilities, TaxTools {
        TaxTools::calculateTax insteadof PriceUtilities;
        TaxTools::calculateTax as private;
        PriceUtilities::calculateTax as private basicTax;
    }

    /** @var float */
    private float $price;

    /**
     * @param float $price
     */
    public function __construct(float $price)
    {
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getFinalPrice(): float
    {
        return $this->price + $this->calculateTax($this->price);
    }

    /**
     * @return float
     */
    protected function getTaxRate(): float
    {
        return 17;
    }
}