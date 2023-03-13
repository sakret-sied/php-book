<?php

namespace Chapter04\Classes;

use Exception;

/**
 * @property string $streetAddress
 */
class Address
{
    /** @var string */
    private const STREET_ADDRESS = 'streetAddress';
    /** @var string|null */
    private ?string $number;
    /** @var string|null */
    private ?string $street;

    /**
     * @param string $maybeNumber
     * @param string|null $maybeStreet
     */
    public function __construct(string $maybeNumber, string $maybeStreet = null)
    {
        if (is_null($maybeStreet)) {
            $this->streetAddress = $maybeNumber;
        } else {
            $this->number = $maybeNumber;
            $this->street = $maybeStreet;
        }
    }

    /**
     * @param string $name
     * @return string|null
     */
    public function __get(string $name): ?string
    {
        if ($name === self::STREET_ADDRESS) {
            return "$this->number $this->street";
        }
        return null;
    }


    /**
     * @param string $name
     * @param string $value
     * @return void
     * @throws Exception
     */
    public function __set(string $name, string $value): void
    {
        if ($name === self::STREET_ADDRESS) {
            if (preg_match("/^(\d+.*?)[\s,]+(.+)$/", $value, $matches)) {
                $this->number = $matches[1];
                $this->street = $matches[2];
            } else {
                throw new Exception("Ошибка в адресе: '$value'");
            }
        }
    }
}
