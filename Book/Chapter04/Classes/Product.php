<?php

namespace Book\Chapter04\Classes;

class Product
{
    /** @var string */
    public string $name;
    /** @var float */
    public float $price;

    /**
     * @param string $name
     * @param float $price
     */
    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}
