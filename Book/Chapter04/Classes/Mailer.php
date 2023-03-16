<?php

namespace Book\Chapter04\Classes;

use Core\Classes\OutputHelper;

class Mailer
{
    public function doMail(Product $product)
    {
        OutputHelper::echoText("отправляется ($product->name)");
    }
}
