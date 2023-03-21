<?php

namespace Book\Chapter05\Classes;

use Book\Chapter03\Classes\BookProduct;
use Book\Chapter03\Classes\CdProduct;
use Book\Chapter03\Classes\ShopProduct;

class Product
{
    /** @var string */
    public string $coverUrl = 'some url';
    /** @var ShopProduct */
    private ShopProduct $thirdPartyShop;

    /**
     * @param ShopProduct $thirdPartyShop
     */
    public function __construct(ShopProduct $thirdPartyShop)
    {
        $this->thirdPartyShop = $thirdPartyShop;
    }

    /**
     * @return CdProduct
     */
    public static function getCdProduct(): CdProduct
    {
        return new CdProduct(
            'Классическая музыка. Лучшее.',
            'Антонио',
            'Вивальди',
            10.99,
            60.33
        );
    }

    /**
     * @return BookProduct
     */
    public static function getBookProduct(): BookProduct
    {
        return new BookProduct(
            'Искусство войны',
            'Сунь-Цзы',
            '',
            30,
            96
        );
    }

    /**
     * @param $name
     * @param $arguments
     * @return false|mixed|void
     */
    public function __call($name, $arguments)
    {
        if (method_exists($this->thirdPartyShop, $name)) {
            return call_user_func_array([
                $this->thirdPartyShop,
                $name,
            ], $arguments);
        }
    }
}
