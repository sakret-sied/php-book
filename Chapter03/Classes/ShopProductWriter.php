<?php

namespace Chapter03\Classes;

use Classes\OutputHelper;

class ShopProductWriter
{
    /** @var ShopProduct[] */
    private array $products = [];

    /**
     * @param ShopProduct $shopProduct
     * @return void
     */
    public function addProduct(ShopProduct $shopProduct): void
    {
        $this->products[] = $shopProduct;
    }

    /**
     * @return void
     */
    public function write(): void
    {
        $str = '';

        foreach ($this->products as $product) {
            $str .= "{$product->getSummaryLine()} ({$product->getPrice()} руб.) " . OutputHelper::newLine();
        }
        echo $str;
    }
}
