<?php

include('../autoload.php');

use Chapter03\Classes\BookProduct;
use Chapter03\Classes\CdProduct;
use Chapter03\Classes\ShopProductWriter;

$book = new BookProduct('Книга', 'Имя автора', 'Фамилия автора', 30, 700);
$cd = new CdProduct('Диск', 'Имя композитора', 'Фамилия композитора', 20, 60);
$productWriter = new ShopProductWriter();
$productWriter->addProduct($book);
$productWriter->addProduct($cd);
$productWriter->write();