<?php

namespace Core\Classes;

use DateTime;
use DateTimeInterface;

class OutputHelper
{
    /** @var bool */
    private static bool $saveMode = false;
    /** @var array */
    private static array $text = [];

    /**
     * @param string $text
     * @return void
     */
    public static function echoText(string $text = ''): void
    {
        if (self::$saveMode) {
            self::$text[] = $text;
        } else {
            echo $text . PHP_EOL;
        }
    }

    /**
     * @param string $text
     * @return string
     */
    public static function loggerText(string $text): string
    {
        return (new DateTime)->format(DateTimeInterface::RFC3339_EXTENDED) . " $text" . PHP_EOL;
    }

    /**
     * @param bool $saveMode
     */
    public static function setSaveMode(bool $saveMode): void
    {
        self::$saveMode = $saveMode;
    }

    /**
     * @return void
     */
    public static function echoSaved($htmlNewLine = false)
    {
        echo implode($htmlNewLine ? '<br>' : PHP_EOL, self::$text);
    }
}
