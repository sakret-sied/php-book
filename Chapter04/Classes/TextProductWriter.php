<?php

namespace Chapter04\Classes;

class TextProductWriter extends ShopProductWriter
{
    /**
     * @return void
     */
    public function write(): void
    {
        $str = "ТОВАРЫ:\r\n";
        foreach ($this->products as $shopProduct)
        {
            $str .= $shopProduct->getSummaryLine() . "\r\n";
        }

        echo $str;
    }
}