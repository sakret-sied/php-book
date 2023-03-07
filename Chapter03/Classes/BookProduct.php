<?php

namespace Chapter03\Classes;

class BookProduct extends ShopProduct
{
    /** @var int */
    private int $numPages;

    /**
     * @param string $title
     * @param string $firstName
     * @param string $secondName
     * @param float $price
     * @param int $numPages
     */
    public function __construct(
        string $title,
        string $firstName,
        string $secondName,
        float $price,
        int $numPages
    ) {
        parent::__construct($title, $firstName, $secondName, $price);
        $this->numPages = $numPages;
    }

    /**
     * @return int
     */
    public function getNumberOfPages(): int
    {
        return $this->numPages;
    }

    /**
     * @return string
     */
    public function getSummaryLine(): string
    {
        return parent::getSummaryLine() . ": $this->numPages стр.";
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }
}
