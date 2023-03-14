<?php

namespace Chapter04\Classes;

use Classes\OutputHelper;
use Closure;

class Totalizer
{
    /**
     * @return Closure
     */
    public static function warnAmount(): Closure
    {
        return function (Product $product) {
            if ($product->price > 5) {
                OutputHelper::echoText("покупается дорогой товар: $product->price");
            }
        };
    }
}
