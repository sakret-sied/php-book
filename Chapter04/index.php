<?php

include('../autoload.php');

use Chapter04\Classes\Person;
use Chapter04\Classes\Runner;
use Chapter04\Classes\ShopProduct;
use Chapter04\Classes\SpreadSheet;
use Chapter04\Classes\StaticExample;
use Chapter04\Classes\User;
use Chapter04\Classes\UtilityService;
use Chapter04\Interfaces\IdentityObject;
use Classes\OutputHelper;

StaticExample::sayHello();
echo OutputHelper::newLine();

//TODO: rewrite this part after initialization sql
/*$dsn = 'sqlite:/' . __DIR__ . '/products.db';
$pdo = new PDO($dsn, null, null);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$obj = ShopProduct::getInstance(1, $pdo);*/

function storeIdentityObject(IdentityObject $identityObject)
{
    // сделать что-нибудь с экземпляром типа IdentityObject
}

$shopProduct = new ShopProduct('Нежное мыло', '', 'Ванная Боба', 1.33);
storeIdentityObject($shopProduct);
echo $shopProduct->calculateTax(100) . OutputHelper::newLine();
echo $shopProduct->generateId() . OutputHelper::newLine();
echo OutputHelper::newLine();

$utilityService = new UtilityService(100);
echo $utilityService->getFinalPrice() . OutputHelper::newLine();

print_r(User::create());
print_r(SpreadSheet::create());
echo OutputHelper::newLine();

try {
    Runner::init();
} catch (Exception $exception) {
    // Полученное исключение
}

$person = new Person();
if (isset($person->name)) {
    echo $person->name;
}
