<?php

namespace Book\Chapter04\Classes;

abstract class ShopProductWriter
{
    /** @var ShopProduct[] */
    protected array $products = [];

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
    abstract public function write(): void;
}
