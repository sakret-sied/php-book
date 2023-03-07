<?php

include('../autoload.php');

use Chapter04\Classes\StaticExample;
use Chapter04\Classes\ShopProduct;
use Chapter04\Classes\UtilityService;
use Chapter04\Interfaces\IdentityObject;

StaticExample::sayHello();
print "\r\n";

//TODO: rewrite this part after initialization sql
/*$dsn = 'sqlite:/' . __DIR__ . '/products.db';
$pdo = new PDO($dsn, null, null);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$obj = ShopProduct::getInstance(1, $pdo);*/

function storeIdentityObject(IdentityObject $identityObject) {
    // сделать что-нибудь с экземпляром типа IdentityObject
}
$p = new ShopProduct('Нежное мыло', '', 'Ванная Боба', 1.33);
storeIdentityObject($p);
print ShopProduct::calculateTax(100) . "\r\n";
print $p->generateId() . "\r\n";
print "\r\n";

$u = new UtilityService();
print $u->calculateTax(100) . "\r\n";
print UtilityService::basicTax(100) . "\r\n";