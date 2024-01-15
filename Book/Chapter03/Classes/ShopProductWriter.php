<?php

namespace Book\Chapter03\Classes;

use Core\Classes\OutputHelper;

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
        foreach ($this->products as $product) {
            OutputHelper::echoText("{$product->getSummaryLine()} ({$product->getPrice()} руб.)");
        }
    }
}
