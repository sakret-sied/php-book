<?php

namespace Core\Classes;

use DateTime;
use DateTimeInterface;

class OutputHelper
{
    /** @var string */
    private static string $saved = '';

    /**
     * @param string $text
     * @param bool $save
     * @return void
     */
    public static function echoText(string $text = '', bool $save = false): void
    {
        $text .= PHP_EOL;
        if ($save) {
            self::$saved .= $text;
        } else {
            echo $text;
        }
    }

    /**
     * @return void
     */
    public static function echoSaved($replaceNewLine = false)
    {
        echo $replaceNewLine ? str_replace(PHP_EOL, '<br>', self::$saved) : self::$saved;
    }

    /**
     * @param string $text
     * @return string
     */
    public static function loggerText(string $text): string
    {
        return (new DateTime)->format(DateTimeInterface::RFC3339_EXTENDED) . " $text" . PHP_EOL;
    }
}
