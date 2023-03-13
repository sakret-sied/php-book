<?php

include('../autoload.php');

use Chapter04\Classes\Address;
use Chapter04\Classes\Person;
use Chapter04\Classes\Runner;
use Chapter04\Classes\ShopProduct;
use Chapter04\Classes\SpreadSheet;
use Chapter04\Classes\StaticExample;
use Chapter04\Classes\User;
use Chapter04\Classes\UtilityService;
use Chapter04\Interfaces\IdentityObject;
use Classes\OutputHelper;

OutputHelper::setNewLine(OutputHelper::WINDOWS);

StaticExample::sayHello();
OutputHelper::echoText();

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
OutputHelper::echoText($shopProduct->calculateTax(100));
OutputHelper::echoText($shopProduct->generateId());
OutputHelper::echoText();

$utilityService = new UtilityService(100);
OutputHelper::echoText($utilityService->getFinalPrice());
OutputHelper::echoText();

print_r(User::create());
print_r(SpreadSheet::create());
OutputHelper::echoText();

try {
    Runner::init();
} catch (Exception $exception) {
    // Полученное исключение
}

$person = new Person();
if (isset($person->name)) {
    $person->name = 'Иван';
    OutputHelper::echoText($person->name);
    $person->writeName();
    OutputHelper::echoText();
}

$address = new Address('441b Bakers Street');

OutputHelper::echoText("Адрес: $address->streetAddress");
$address = new Address('15', 'Albert Mews');
OutputHelper::echoText("Адрес: $address->streetAddress");
$address->streetAddress = '34, West 24th Avenue';
OutputHelper::echoText("Адрес: $address->streetAddress");
OutputHelper::echoText();

$newPerson = new Person('Иван', 44);
$newPerson->setId(343);
unset($newPerson);
OutputHelper::echoText();
