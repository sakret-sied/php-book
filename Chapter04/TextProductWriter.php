<?php

namespace Chapter04;

class TextProductWriter extends ShopProductWriter
{
    /**
     * @return void
     */
    public function write(): void
    {
        $str = "ТОВАРЫ:\n";
        foreach ($this->products as $shopProduct)
        {
            $str .= $shopProduct->getSummaryLine() . "\n";
        }

        print $str;
    }
}