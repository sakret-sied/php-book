<?php

namespace Chapter03\Classes;

class ShopProduct
{
    /** @var float */
    protected float $price;

    /** @var string */
    private string $title;
    /** @var string */
    private string $producerMainName;
    /** @var string */
    private string $producerFirstName;
    /** @var float */
    private float $discount = 0;

    /**
     * @param string $title
     * @param string $firstName
     * @param string $secondName
     * @param float $price
     */
    public function __construct(
        string $title,
        string $firstName,
        string $secondName,
        float $price
    ) {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $secondName;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getProducerFirstName(): string
    {
        return $this->producerFirstName;
    }

    /**
     * @return string
     */
    public function getProducerMainName(): string
    {
        return $this->producerMainName;
    }

    /**
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * @param float $discount
     */
    public function setDiscount(float $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price - $this->discount;
    }

    /**
     * @return string
     */
    public function getProducer(): string
    {
        return $this->producerFirstName . ' ' . $this->producerMainName;
    }

    /**
     * @return string
     */
    public function getSummaryLine(): string
    {
        return "$this->title ($this->producerMainName, $this->producerFirstName)";
    }
}
