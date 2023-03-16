<?php

namespace Book\Chapter04\Classes;

use Closure;
use Core\Classes\OutputHelper;

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
