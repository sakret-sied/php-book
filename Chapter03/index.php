<?php

include('../autoload.php');

use Chapter03\Classes\BookProduct;
use Chapter03\Classes\CdProduct;
use Chapter03\Classes\ShopProductWriter;

$bookProduct = new BookProduct('Книга', 'Имя автора', 'Фамилия автора', 30, 700);
$cdProduct = new CdProduct('Диск', 'Имя композитора', 'Фамилия композитора', 20, 60);
$shopProductWriter = new ShopProductWriter();
$shopProductWriter->addProduct($bookProduct);
$shopProductWriter->addProduct($cdProduct);
$shopProductWriter->write();
