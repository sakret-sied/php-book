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

    /**
     * @param string $platform
     * @return string
     */
    public static function newLine(string $platform = self::WINDOWS): string
    {
        switch ($platform) {
            case self::WINDOWS:
                return self::NEW_LINE_WINDOWS;
            case self::UNIX:
                return self::NEW_LINE_UNIX;
            case self::HTML:
                return self::NEW_LINE_HTML;
        }
    }

    /**
     * @param string $text
     * @return string
     */
    public static function loggerText(string $text): string
    {
        return (new DateTime)->format(DateTimeInterface::RFC3339_EXTENDED) . ' ' . $text;
    }
}
