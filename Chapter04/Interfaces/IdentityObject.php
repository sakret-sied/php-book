<?php

namespace Chapter04\Interfaces;

interface IdentityObject
{
    /**
     * @return string
     */
    public function generateId(): string;
}
