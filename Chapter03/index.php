<?php

include('../autoload.php');

use Chapter03\BookProduct;
use Chapter03\CdProduct;
use Chapter03\ShopProductWriter;

$book = new BookProduct('Книга', 'Имя автора', 'Фамилия автора', 30, 700);
$cd = new CdProduct('Диск', 'Имя композитора', 'Фамилия композитора', 20, 60);
$productWriter = new ShopProductWriter();
$productWriter->addProduct($book);
$productWriter->addProduct($cd);
$productWriter->write();