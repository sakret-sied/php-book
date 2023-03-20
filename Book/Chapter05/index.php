<?php

namespace Book\Chapter05;

use Exception;

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

$myObject = new $qClassName();
$myObject->doSpeak();

print_r(get_declared_classes());
