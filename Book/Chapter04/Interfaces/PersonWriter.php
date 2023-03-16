<?php

namespace Book\Chapter04\Interfaces;

use Book\Chapter04\Classes\Person2;

interface PersonWriter
{
    /**
     * @param Person2 $person2
     * @return mixed
     */
    public function write(Person2 $person2);
}
