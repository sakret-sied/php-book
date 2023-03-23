<?php

require_once '../../autoload.php';

use Book\Chapter03\Classes\CdProduct;
use Book\Chapter05\Classes\ClassInfo;
use Book\Chapter05\Classes\ModuleRunner;
use Book\Chapter05\Classes\Product;
use Book\Chapter05\Classes\ReflectionUtil;
use Core\Classes\Config;
use Core\Classes\OutputHelper;

OutputHelper::setSaveMode(Config::OUTPUT_HELPER_SAVE_MODE);
OutputHelper::setIsHtml(Config::OUTPUT_HELPER_IS_HTML);

$qClassName = '\Book\Chapter05\Tasks\Task';
$myObject = new $qClassName();
$myObject->doSpeak();

$cdProduct = Product::getCdProduct();
if ($cdProduct instanceof CdProduct) {
    OutputHelper::echoText('$product является объектом класса CdProduct');
}
OutputHelper::echoText(CdProduct::class, 2);

$method = 'getTitle';
if (in_array($method, get_class_methods($cdProduct))) {
    $cdProduct->$method();
}
if (method_exists($cdProduct, $method)) {
    $cdProduct->$method();
}
if (is_callable([$cdProduct, $method])) {
    $cdProduct->$method();
}

OutputHelper::printR(get_class_vars('\Book\Chapter05\Classes\Product'));
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
ClassInfo::echoClassData($cdProductReflection, 'reflectionClass');

OutputHelper::echoText('', 3);
OutputHelper::echoText(
    Config::OUTPUT_HELPER_IS_HTML
        ? str_replace(PHP_EOL, '<br>', ReflectionUtil::getClassSource($cdProductReflection))
        : ReflectionUtil::getClassSource($cdProductReflection),
    4
);

$methods = $cdProductReflection->getMethods();
foreach ($methods as $method) {
    ClassInfo::echoMethodData($method, $method->getName());
}

$getSummaryLine = $cdProductReflection->getMethod('GetSummaryLine');
OutputHelper::echoText('', 3);
OutputHelper::echoText(
    Config::OUTPUT_HELPER_IS_HTML
        ? str_replace(PHP_EOL, '<br>', ReflectionUtil::getMethodSource($getSummaryLine))
        : ReflectionUtil::getMethodSource($getSummaryLine),
    4
);

$construct = $cdProductReflection->getMethod('__construct');
$parameters = $construct->getParameters();
foreach ($parameters as $parameter) {
    ClassInfo::echoParameterData($parameter);
}

$test = new ModuleRunner();
try {
    $test->init()->execute();
} catch (ReflectionException|Exception $e) {
}

OutputHelper::echoSaved();
