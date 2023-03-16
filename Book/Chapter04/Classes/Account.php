<?php

namespace Book\Chapter04\Classes;

class Account
{
    /** @var float */
    public float $balance;

    /**
     * @param float $balance
     */
    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }
}
