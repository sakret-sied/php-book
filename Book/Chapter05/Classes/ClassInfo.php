<?php

namespace Book\Chapter05\Classes;

use Core\Classes\OutputHelper;
use ReflectionClass;
use ReflectionMethod;
use ReflectionParameter;

class ClassInfo
{
    /**
     * @param ReflectionClass $class
     * @param string $address
     * @return void
     */
    public static function echoClassData(ReflectionClass $class, string $address = OutputHelper::DEFAULT_ADDRESS): void
    {
        $prevAddress = OutputHelper::getAddress();
        $info = '';
        OutputHelper::setAddress($address);
        OutputHelper::echoText($class->getName());
        if ($class->isUserDefined()) {
            OutputHelper::echoText("{$info}определён пользователем");
        }
        if ($class->isInternal()) {
            OutputHelper::echoText("{$info}встроенный класс");
        }
        if ($class->isInterface()) {
            OutputHelper::echoText("{$info}интерфейс");
        }
        if ($class->isAbstract()) {
            OutputHelper::echoText("{$info}абстрактный класс");
        }
        if ($class->isFinal()) {
            OutputHelper::echoText("{$info}завершённый класс");
        }
        if ($class->isInstantiable()) {
            OutputHelper::echoText("{$info}можно создать экземпляр класса");
        } else {
            OutputHelper::echoText("{$info}нельзя создать экземпляр класса");
        }
        if ($class->isCloneable()) {
            OutputHelper::echoText("{$info}можно клонировать");
        } else {
            OutputHelper::echoText("{$info}нельзя клонировать");
        }
        OutputHelper::echoText();
        OutputHelper::setAddress($prevAddress);
    }

    /**
     * @param ReflectionMethod $method
     * @param string $address
     * @return void
     */
    public static function echoMethodData(ReflectionMethod $method, string $address = OutputHelper::DEFAULT_ADDRESS): void
    {
        $prevAddress = OutputHelper::getAddress();
        $info = '';
        OutputHelper::setAddress($address);
        OutputHelper::echoText("{$method->getName()}()");
        if ($method->isUserDefined()) {
            OutputHelper::echoText("{$info}определён пользователем");
        }
        if ($method->isInternal()) {
            OutputHelper::echoText("{$info}встроенный метод");
        }
        if ($method->isAbstract()) {
            OutputHelper::echoText("{$info}абстрактный метод");
        }
        if ($method->isPublic()) {
            OutputHelper::echoText("{$info}открытый метод");
        }
        if ($method->isProtected()) {
            OutputHelper::echoText("{$info}защищённый метод");
        }
        if ($method->isPrivate()) {
            OutputHelper::echoText("{$info}закрытый метод");
        }
        if ($method->isStatic()) {
            OutputHelper::echoText("{$info}статический метод");
        }
        if ($method->isFinal()) {
            OutputHelper::echoText("{$info}завершённый метод");
        }
        if ($method->isConstructor()) {
            OutputHelper::echoText("{$info}конструктор");
        }
        if ($method->returnsReference()) {
            OutputHelper::echoText("{$info}возвращает ссылку, а не значение");
        }
        OutputHelper::echoText();
        OutputHelper::setAddress($prevAddress);
    }

    /**
     * @param ReflectionParameter $parameter
     * @param string $address
     * @return void
     */
    public static function echoParameterData(ReflectionParameter $parameter, string $address = OutputHelper::DEFAULT_ADDRESS): void
    {
        $prevAddress = OutputHelper::getAddress();
        $info = '';
        OutputHelper::setAddress($address);
        OutputHelper::echoText("\${$parameter->getName()}");
        OutputHelper::echoText("{$info}расположен в позиции {$parameter->getPosition()}");
        $class = $parameter->getClass();
        if (!empty($class)) {
            OutputHelper::echoText("{$info}должно быть объектом типа {$class->getName()}");
        }
        if ($parameter->isPassedByReference()) {
            OutputHelper::echoText("{$info}передан по ссылке");
        }
        if ($parameter->isDefaultValueAvailable()) {
            OutputHelper::echoText("{$info}имеет стандартное значение {$parameter->getDefaultValue()}");
        }
        if ($parameter->allowsNull()) {
            OutputHelper::echoText("{$info}может быть null");
        }
        OutputHelper::echoText();
        OutputHelper::setAddress($prevAddress);
    }
}
