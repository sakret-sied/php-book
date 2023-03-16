<?php

namespace Book\Chapter04\Classes;

class TextProductWriter extends ShopProductWriter
{
    /**
     * @return void
     */
    public function write(): void
    {
        $str = 'ТОВАРЫ:' . PHP_EOL;
        foreach ($this->products as $shopProduct) {
            $str .= $shopProduct->getSummaryLine() . PHP_EOL;
        }

        echo $str;
    }
}
