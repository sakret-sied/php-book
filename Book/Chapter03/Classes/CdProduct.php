<?php

namespace Book\Chapter03\Classes;

class CdProduct extends ShopProduct
{
    /** @var int */
    private int $playLength;

    /**
     * @param string $title
     * @param string $firstName
     * @param string $secondName
     * @param float $price
     * @param int $playLength
     */
    public function __construct(
        string $title,
        string $firstName,
        string $secondName,
        float $price,
        int $playLength
    ) {
        parent::__construct($title, $firstName, $secondName, $price);
        $this->playLength = $playLength;
    }

    /**
     * @return int
     */
    public function getPlayLength(): int
    {
        return $this->playLength;
    }

    /**
     * @return string
     */
    public function getSummaryLine(): string
    {
        $base = parent::getSummaryLine();
        $base .= ": Время звучания - $this->playLength мин.";
        return $base;
    }
}
