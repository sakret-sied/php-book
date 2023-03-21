<?php

namespace Core\Classes;

use DateTime;
use DateTimeInterface;

class OutputHelper
{
    /** @var string */
    public const DEFAULT_ADDRESS = 'main';
    /** @var array */
    public static array $text = [self::DEFAULT_ADDRESS => []];
    /** @var bool */
    private static bool $saveMode = false;
    /** @var string */
    private static string $address = self::DEFAULT_ADDRESS;

    /** @var bool */
    private static bool $htmlNewLine = false;

    /**
     * @param string $text
     * @return string
     */
    public static function loggerText(string $text): string
    {
        return (new DateTime)->format(DateTimeInterface::RFC3339_EXTENDED) . " $text" . PHP_EOL;
    }

    /**
     * @param string $text
     * @return void
     */
    public static function echoText(string $text = ''): void
    {
        if (self::$saveMode) {
            if (!isset(self::$text[self::$address])) {
                self::$text[self::$address] = [];
                self::$text[self::DEFAULT_ADDRESS][self::$address] =& self::$text[self::$address];
            }
            self::$text[self::$address][] = $text;
        } else {
            echo $text . self::getNewLine();
        }
    }

    /**
     * @param string|null $address
     * @return void
     */
    public static function echoSaved(?string $address = null)
    {
        $newLine = self::getNewLine();
        foreach (self::$text[$address ?? self::DEFAULT_ADDRESS] as $name => $value) {
            if (is_array($value)) {
                self::echoSaved($name);
            } else {
                echo $value . $newLine;
            }
        }
    }

    /**
     * @param string|null $address
     * @return void
     */
    public static function cleanSaved(?string $address = null): void
    {
        self::$text[$address ?? self::$address] = [];
    }

    /**
     * @param bool $htmlNewLine
     */
    public static function setHtmlNewLine(bool $htmlNewLine): void
    {
        self::$htmlNewLine = $htmlNewLine;
    }

    /**
     * @param bool $saveMode
     * @return void
     */
    public static function setSaveMode(bool $saveMode): void
    {
        self::$saveMode = $saveMode;
    }

    /**
     * @param string $address
     * @return void
     */
    public static function setAddress(string $address = self::DEFAULT_ADDRESS)
    {
        self::$address = $address;
    }

    /**
     * @return string
     */
    private static function getNewLine(): string
    {
        return self::$htmlNewLine ? '<br>' : PHP_EOL;
    }
}
