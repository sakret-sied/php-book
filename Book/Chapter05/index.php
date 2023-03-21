<?php

namespace Book\Chapter05;

use Book\Chapter03\Classes\CdProduct;
use Book\Chapter05\Classes\ClassInfo;
use Book\Chapter05\Classes\Product;
use Book\Chapter05\Classes\ReflectionUtil;
use Book\Chapter05\Tasks\Task;
use Core\Classes\OutputHelper;
use Exception;
use ReflectionClass;

$base = __DIR__;
$className = 'Task';
$path = "$base\Tasks\\$className.php";
if (!file_exists($path)) {
    throw new Exception("Файл не найден: $path");
}
require_once $path;
$qClassName = __NAMESPACE__ . "\Tasks\\$className";
if (!class_exists($qClassName)) {
    throw new Exception("Файл не найден: $qClassName");
}

require_once '../../autoload.php';
OutputHelper::setSaveMode(true);

/** @var Task $myObject */
$myObject = new $qClassName();
$myObject->doSpeak();

//print_r(get_declared_classes());

$cdProduct = Product::getCdProduct();
if ($cdProduct instanceof CdProduct) {
    OutputHelper::echoText('$product является объектом класса CdProduct');
}
OutputHelper::echoText(CdProduct::class);

$method = 'getTitle';
if (in_array($method, get_class_methods($cdProduct))) {
    OutputHelper::echoText($cdProduct->$method());
}
if (method_exists($cdProduct, $method)) {
    OutputHelper::echoText($cdProduct->$method());
}
if (is_callable([$cdProduct, $method])) {
    OutputHelper::echoText($cdProduct->$method());
}

print_r(get_class_vars('\Book\Chapter05\Classes\Product'));
OutputHelper::echoText(get_parent_class('\Book\Chapter03\Classes\BookProduct'));

$bookProduct = Product::getBookProduct();
$class = '\Book\Chapter03\Classes\ShopProduct';
if (is_subclass_of($bookProduct, $class)) {
    OutputHelper::echoText("\$product является подклассом $class");
}
$interface = 'someInterface';
if (in_array($interface, class_implements($bookProduct))) {
    OutputHelper::echoText("\$product реализован интерфейс $interface");
}
call_user_func([$bookProduct, 'setDiscount'], 20);
OutputHelper::echoText();

$cdProductReflection = new ReflectionClass('\Book\Chapter03\Classes\CdProduct');
OutputHelper::setAddress('reflectionClass');
ClassInfo::getData($cdProductReflection);

OutputHelper::echoText(ReflectionUtil::getClassSource($cdProductReflection));
OutputHelper::echoText();

$methods = $cdProductReflection->getMethods();
foreach ($methods as $method) {
    OutputHelper::setAddress($method->getName());
    OutputHelper::echoText('----');
    ClassInfo::methodData($method);
    OutputHelper::echoText();
}

OutputHelper::echoText();
OutputHelper::echoSaved();
