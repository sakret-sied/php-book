<?php

namespace Chapter04\Interfaces;

use Chapter04\Classes\Person2;

interface PersonWriter
{
    /**
     * @param Person2 $person2
     * @return mixed
     */
    public function write(Person2 $person2);
}
