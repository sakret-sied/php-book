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
        print StaticExample::$aNum . "\r\n";
        print "Здравствуй, Мир!\r\n";
    }
}