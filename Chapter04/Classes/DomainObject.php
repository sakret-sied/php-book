<?php

namespace Chapter04\Classes;

abstract class DomainObject
{
    /** @var string */
    private string $group;

    public function __construct()
    {
        $this->group = static::getGroup();
    }

    /**
     * @return string
     */
    public static function getGroup(): string
    {
        return 'default';
    }

    /**
     * @return DomainObject
     */
    public static function create(): DomainObject
    {
        return new static();
    }
}
