<?php

namespace Book\Chapter05\Classes;

use Core\Classes\OutputHelper;
use ReflectionClass;
use ReflectionMethod;

class ClassInfo
{
    /**
     * @param ReflectionClass $class
     * @return void
     */
    public static function getData(ReflectionClass $class): void
    {
        $name = $class->getName();
        if ($class->isUserDefined()) {
            OutputHelper::echoText("$name -- определён пользователем");
        }
        if ($class->isInternal()) {
            OutputHelper::echoText("$name -- встроенный класс");
        }
        if ($class->isInterface()) {
            OutputHelper::echoText("$name -- интерфейс");
        }
        if ($class->isAbstract()) {
            OutputHelper::echoText("$name -- абстрактный класс");
        }
        if ($class->isFinal()) {
            OutputHelper::echoText("$name -- завершённый класс");
        }
        if ($class->isInstantiable()) {
            OutputHelper::echoText("$name -- можно создать экземпляр класса");
        } else {
            OutputHelper::echoText("$name -- нельзя создать экземпляр класса");
        }
        if ($class->isCloneable()) {
            OutputHelper::echoText("$name -- можно клонировать");
        } else {
            OutputHelper::echoText("$name -- нельзя клонировать");
        }
    }

    /**
     * @param ReflectionMethod $method
     * @return void
     */
    public static function methodData(ReflectionMethod $method): void
    {
        $name = $method->getName();
        if ($method->isUserDefined()) {
            OutputHelper::echoText("$name -- определён пользователем");
        }
        if ($method->isInternal()) {
            OutputHelper::echoText("$name -- встроенный метод");
        }
        if ($method->isAbstract()) {
            OutputHelper::echoText("$name -- абстрактный метод");
        }
        if ($method->isPublic()) {
            OutputHelper::echoText("$name -- открытый метод");
        }
        if ($method->isProtected()) {
            OutputHelper::echoText("$name -- защищённый метод");
        }
        if ($method->isPrivate()) {
            OutputHelper::echoText("$name -- закрытый метод");
        }
        if ($method->isStatic()) {
            OutputHelper::echoText("$name -- статический метод");
        }
        if ($method->isFinal()) {
            OutputHelper::echoText("$name -- завершённый метод");
        }
        if ($method->isConstructor()) {
            OutputHelper::echoText("$name -- конструктор");
        }
        if ($method->returnsReference()) {
            OutputHelper::echoText("$name -- возвращает ссылку, а не значение");
        }
    }
}
