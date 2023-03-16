<?php

namespace Book\Chapter04\Interfaces;

interface IdentityObject
{
    /**
     * @return string
     */
    public function generateId(): string;
}
