<?php

namespace Chapter04\Classes;

use Classes\OutputHelper;

class TextProductWriter extends ShopProductWriter
{
    /**
     * @return void
     */
    public function write(): void
    {
        $str = 'ТОВАРЫ:' . OutputHelper::getNewLine();
        foreach ($this->products as $shopProduct)
        {
            $str .= $shopProduct->getSummaryLine() . OutputHelper::getNewLine();
        }

        echo $str;
    }
}
