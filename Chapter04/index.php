<?php

include('../autoload.php');

use Chapter04\Classes\Conf;
use Chapter04\Classes\ShopProduct;
use Chapter04\Classes\SpreadSheet;
use Chapter04\Classes\StaticExample;
use Chapter04\Classes\User;
use Chapter04\Classes\UtilityService;
use Chapter04\Interfaces\IdentityObject;

StaticExample::sayHello();
echo "\r\n";

//TODO: rewrite this part after initialization sql
/*$dsn = 'sqlite:/' . __DIR__ . '/products.db';
$pdo = new PDO($dsn, null, null);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$obj = ShopProduct::getInstance(1, $pdo);*/

function storeIdentityObject(IdentityObject $identityObject)
{
    // сделать что-нибудь с экземпляром типа IdentityObject
}

$p = new ShopProduct('Нежное мыло', '', 'Ванная Боба', 1.33);
storeIdentityObject($p);
echo $p->calculateTax(100) . "\r\n";
echo $p->generateId() . "\r\n";
echo "\r\n";

$u = new UtilityService(100);
echo $u->getFinalPrice() . "\r\n";

print_r(User::create());
print_r(SpreadSheet::create());

try {
    $conf = new Conf(__DIR__ . '\Files\conf01.xml');
    echo "user: {$conf->get('user')}\r\n";
    echo "host: {$conf->get('host')}\r\n";
    $conf->set('pass', 'my_pass');
    $conf->write();
} catch (Exception $e) {
    die($e->__toString());
}