<?php

namespace Classes;

use DateTime;
use DateTimeInterface;

class OutputHelper
{
    /** @var string */
    public const WINDOWS = 'windows';
    /** @var string */
    public const UNIX = 'unix';
    /** @var string */
    public const HTML = 'html';

    /** @var string */
    public const NEW_LINE_WINDOWS = "\r\n";
    /** @var string */
    public const NEW_LINE_UNIX = "\n";
    /** @var string */
    public const NEW_LINE_HTML = "<br />";

    /** @var string */
    private static string $newLine = '';

    /**
     * @param string $text
     * @return void
     */
    public static function echoText(string $text = ''): void
    {
        echo $text . self::getNewLine();
    }

    /**
     * @return string
     */
    public static function getNewLine(): string
    {
        return self::$newLine;
    }

    /**
     * @param string $platform
     * @return void
     */
    public static function setNewLine(string $platform)
    {
        switch ($platform) {
            case self::WINDOWS:
                self::$newLine = self::NEW_LINE_WINDOWS;
                break;
            case self::UNIX:
                self::$newLine = self::NEW_LINE_UNIX;
                break;
            case self::HTML:
                self::$newLine = self::NEW_LINE_HTML;
                break;
            default:
                self::$newLine = '';
        }
    }

    /**
     * @param string $text
     * @return string
     */
    public static function loggerText(string $text): string
    {
        return (new DateTime)->format(DateTimeInterface::RFC3339_EXTENDED) . " $text" . self::getNewLine();
    }
}
