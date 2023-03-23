<?php

namespace Book\Chapter04\Classes;

use Book\Chapter03\Classes\BookProduct;
use Book\Chapter03\Classes\CdProduct;
use Book\Chapter04\Interfaces\Chargeable;
use Book\Chapter04\Interfaces\IdentityObject;
use Book\Chapter04\Traits\IdentityTrait;
use Book\Chapter04\Traits\PriceUtilities;
use PDO;

class ShopProduct extends \Book\Chapter03\Classes\ShopProduct implements Chargeable, IdentityObject
{
    use PriceUtilities, IdentityTrait;

    /** @var int */
    public const AVAILABLE = 0;
    /** @var int */
    public const OUT_OF_STOCK = 1;

    /** @var int */
    private int $id = 0;

    /**
     * @param int $id
     * @param PDO $pdo
     * @return ShopProduct|null
     */
    public static function getInstance(int $id, PDO $pdo): ?ShopProduct
    {
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id=?");
        $result = $stmt->execute([$id]);
        $row = $stmt->fetch();

        if (empty($row)) {
            return null;
        }
        switch ($row['type'] ?? '') {
            case 'Book':
                $product = new BookProduct(
                    $row['title'],
                    $row['first_name'],
                    $row['main_name'],
                    (float)$row['price'],
                    (int)$row['num_pages'],
                );
                break;
            case 'cd':
                $product = new CdProduct(
                    $row['title'],
                    $row['first_name'],
                    $row['main_name'],
                    (float)$row['price'],
                    (int)$row['play_length'],
                );
                break;
            default:
                $firstName = is_null($row['first_name']) ? '' : $row['first_name'];
                $product = new ShopProduct(
                    $row['title'],
                    $firstName,
                    $row['main_name'],
                    (float)$row['price'],
                );
        }
        $product->setId((int)$row['id']);
        $product->setDiscount((int)$row['discount']);

        return $product;
    }

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return float
     */
    protected function getTaxRate(): float
    {
        return 17;
    }
}
