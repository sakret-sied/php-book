<?php

namespace Chapter04\Classes;

class Document extends DomainObject
{
    /**
     * @return string
     */
    public static function getGroup(): string
    {
        return 'document';
    }
}
