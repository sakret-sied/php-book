<?php

namespace Chapter04\Classes;

use Classes\OutputHelper;

class StaticExample
{
    /** @var int */
    public static int $aNum = 0;

    /**
     * @return void
     */
    public static function sayHello(): void
    {
        echo StaticExample::$aNum . OutputHelper::newLine();
        echo 'Здравствуй, Мир!' . OutputHelper::newLine();
    }
}
