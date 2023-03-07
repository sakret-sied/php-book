<?php

namespace Chapter04\Traits;

trait TaxTools
{
    /**
     * @param float $price
     * @return float
     */
    public function calculateTax(float $price): float
    {
        return 222;
    }
}