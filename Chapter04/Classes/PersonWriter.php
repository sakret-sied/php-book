<?php

namespace Chapter04\Classes;

use Classes\OutputHelper;

class PersonWriter
{
    /**
     * @param Person $person
     * @return void
     */
    public function writeName(Person $person): void
    {
        OutputHelper::echoText($person->getName());
    }

    /**
     * @param Person $person
     * @return void
     */
    public function writeAge(Person $person): void
    {
        OutputHelper::echoText($person->getAge());
    }
}
