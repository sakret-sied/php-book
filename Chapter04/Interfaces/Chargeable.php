<?php

namespace Chapter04\Interfaces;

interface Chargeable
{
    /**
     * @return float
     */
    public function getPrice(): float;
}