<?php

namespace Book\Chapter05\Classes;

use Book\Chapter05\Interfaces\Module;
use Core\Classes\OutputHelper;

class PersonModule implements Module
{
    /**
     * @param Person $person
     * @return void
     */
    public function setPerson(Person $person): void
    {
        OutputHelper::echoText("PersonModule::setPerson() : $person->name");
    }

    /**
     * @return void
     */
    public function execute()
    {
        OutputHelper::echoText('Запущен модуль ' . __CLASS__);
    }
}
