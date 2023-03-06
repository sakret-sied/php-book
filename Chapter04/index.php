<?php

include('../autoload.php');

use Chapter04\StaticExample;
use Chapter04\ShopProduct;

StaticExample::sayHello();

//TODO: rewrite this part after initialization sql
$dsn = 'sqlite:/' . __DIR__ . '/products.db';
$pdo = new PDO($dsn, null, null);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$obj = ShopProduct::getInstance(1, $pdo);