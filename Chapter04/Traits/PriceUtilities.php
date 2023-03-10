<?php

namespace Chapter04\Traits;

trait PriceUtilities
{
    /**
     * @param float $price
     * @return float
     */
    public function calculateTax(float $price): float
    {
        return $this->getTaxRate() / 100 * $price;
    }

    /**
     * @return float
     */
    abstract protected function getTaxRate(): float;

    // Другие служебные методы
}
