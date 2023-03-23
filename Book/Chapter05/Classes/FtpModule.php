<?php

namespace Book\Chapter05\Classes;

use Book\Chapter05\Interfaces\Module;
use Core\Classes\OutputHelper;

class FtpModule implements Module
{
    /**
     * @param string $host
     * @return void
     */
    public function setHost(string $host): void
    {
        OutputHelper::echoText("FtpModule::setHost() : $host");
    }

    /**
     * @param string $user
     * @return void
     */
    public function setUser(string $user): void
    {
        OutputHelper::echoText("FtpModule::setUser() : $user");
    }

    /**
     * @return void
     */
    public function execute()
    {
        OutputHelper::echoText('Запущен модуль ' . __CLASS__);
    }
}
