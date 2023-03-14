<?php

namespace Chapter04\Classes;

use Classes\OutputHelper;
use Closure;

class Totalizer2
{
    /**
     * @param $amount
     * @return Closure
     */
    public static function warnAmount($amount): Closure
    {
        $count = 0;
        return function ($product) use ($amount, &$count) {
            $count += $product->price;
            OutputHelper::echoText("сумма: $count");
            if ($count > $amount) {
                OutputHelper::echoText(OutputHelper::getNewLine() . "Продано товаров на сумму: $count");
            }
        };
    }
}
