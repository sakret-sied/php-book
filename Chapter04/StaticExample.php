<?php

namespace Chapter04;

class StaticExample
{
    /** @var int */
    public static int $aNum = 0;

    /**
     * @return void
     */
    public static function sayHello(): void
    {
        print StaticExample::$aNum;
        print "Здравствуй, Мир!";
    }
}