<?php

namespace Chapter04\Classes;

class StaticExample
{
    /** @var int */
    public static int $aNum = 0;

    /**
     * @return void
     */
    public static function sayHello(): void
    {
        echo StaticExample::$aNum . "\r\n";
        echo "Здравствуй, Мир!\r\n";
    }
}
