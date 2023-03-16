<?php

namespace Book\Chapter04\Classes;

use Closure;
use Core\Classes\OutputHelper;

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
                OutputHelper::echoText(PHP_EOL . "Продано товаров на сумму: $count");
            }
        };
    }
}
