<?php

namespace Chapter04\Traits;

trait PriceUtilities
{
    /** @var int */
    private static int $taxRate = 17;

    /**
     * @param float $price
     * @return float
     */
    public static function calculateTax(float $price): float
    {
        return self::$taxRate / 100 * $price;
    }

    // Другие служебные методы
}