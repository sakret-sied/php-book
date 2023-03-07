<?php

namespace Chapter04\Traits;

trait IdentityTrait
{
    /**
     * @return string
     */
    public function generateId(): string
    {
        return uniqid();
    }
}