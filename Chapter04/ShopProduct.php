<?php

namespace Chapter04;

use Chapter03\BookProduct;
use Chapter03\CdProduct;
use PDO;

class ShopProduct extends \Chapter03\ShopProduct
{
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
            case 'book':
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
}
