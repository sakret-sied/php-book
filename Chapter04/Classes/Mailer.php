<?php

namespace Chapter04\Classes;

use Classes\OutputHelper;

class Mailer
{
    public function doMail(Product $product)
    {
        OutputHelper::echoText("отправляется ($product->name)");
    }
}
