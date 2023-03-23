<?php

namespace Book\Chapter05\Classes;

class Person
{
    /** @var string */
    public string $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
