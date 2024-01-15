<?php

namespace Core\Classes;

use DateTime;
use DateTimeInterface;

class OutputHelper
{
    /** @var string */
    public const DEFAULT_ADDRESS = 'main';

    /** @var bool */
    private static bool $isSaveMode = false;
    /** @var array */
    private static array $text = [self::DEFAULT_ADDRESS => []];
    /** @var string */
    private static string $address = self::DEFAULT_ADDRESS;

    /** @var bool */
    private static bool $isHtml = false;
    /** @var string */
    private static string $newLine = PHP_EOL;
    /** @var array */
    private static array $pre = ['', ''];

    /**
     * @param bool $isSaveMode
     * @return void
     */
    public static function setIsSaveMode(bool $isSaveMode): void
    {
        self::$isSaveMode = $isSaveMode;
    }

    /**
     * @param string $address
     * @return void
     */
    public static function setAddress(string $address = self::DEFAULT_ADDRESS): void
    {
        self::$address = $address;
    }

    /**
     * @return string
     */
    public static function getAddress(): string
    {
        return self::$address;
    }

    /**
     * @param bool $isHtml
     */
    public static function setIsHtml(bool $isHtml): void
    {
        self::$isHtml = $isHtml;
        self::setNewLine(self::$isHtml);
        self::setPre(self::$isHtml);
    }

    /**
     * @param bool $isHtml
     * @return void
     */
    private static function setNewLine(bool $isHtml): void
    {
        self::$newLine = $isHtml ? '<br>' : PHP_EOL;
    }

    /**
     * @param bool $isHtml
     * @return void
     */
    private static function setPre(bool $isHtml): void
    {
        self::$pre = $isHtml ? ['<pre>', '</pre>'] : ['', ''];
    }

    /**
     * @param string $text
     * @return string
     */
    public static function loggerText(string $text): string
    {
        return (new DateTime())->format(DateTimeInterface::RFC3339_EXTENDED) . " $text" . PHP_EOL;
    }

    /**
     * @param string $text
     * @param int $lineBreak
     * @return void
     */
    public static function echoText(string $text = '', int $lineBreak = 1): void
    {
        if (self::$isSaveMode) {
            if (!isset(self::$text[self::$address])) {
                self::$text[self::$address] = [];
                self::$text[self::DEFAULT_ADDRESS][self::$address] =& self::$text[self::$address];
            }
            self::$text[self::$address][] = $text;
            while ($lineBreak-- > 1) {
                self::$text[self::$address][] = '';
            }
        } else {
            echo $text . str_repeat(self::$newLine, $lineBreak);
        }
    }

    /**
     * @param $value
     * @param int $numberOfNewLines
     * @return void
     */
    public static function printR($value, int $numberOfNewLines = 1): void
    {
        $printR = print_r($value, true);
        $text = self::$isSaveMode ? self::$pre[0] . $printR . self::$pre[1] : $printR;
        OutputHelper::echoText($text, $numberOfNewLines);
    }

    /**
     * @param string|null $address
     * @return void
     */
    public static function echoSaved(?string $address = null): void
    {
        foreach (self::$text[$address ?? self::$address] as $name => $value) {
            if (is_array($value)) {
                self::echoSaved($name);
            } else {
                echo $value . self::$newLine;
            }
        }
    }
}
