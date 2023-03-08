<?php

namespace Chapter03\Classes;

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
            $str .= "{$product->getSummaryLine()} ({$product->getPrice()} руб.) <br />";
        }
        echo $str;
    }
}
