<?php

namespace Book\Chapter05\Classes;

use Book\Chapter05\Interfaces\Module;
use Exception;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;

class ModuleRunner
{
    /** @var array|string[][] */
    private array $configData = [
        'PersonModule' => [
            'person' => 'bob',
        ],
        'FtpModule' => [
            'host' => 'example.com',
            'user' => 'anon',
        ],
    ];

    /** @var Module[] */
    private array $modules = [];

    /**
     * @return ModuleRunner
     * @throws ReflectionException
     * @throws Exception
     */
    public function init(): ModuleRunner
    {
        $interface = new ReflectionClass('Book\Chapter05\Interfaces\Module');
        foreach ($this->configData as $moduleName => $parameters) {
            $moduleClass = new ReflectionClass("Book\Chapter05\Classes\\$moduleName");
            if (!$moduleClass->isSubclassOf($interface)) {
                throw new Exception("Неизвестный тип модуля: $moduleName");
            }
            /** @var Module $module */
            $module = $moduleClass->newInstance();
            foreach ($moduleClass->getMethods() as $method) {
                $this->handleMethod($module, $method, $parameters);
            }
            $this->modules[] = $module;
        }
        return $this;
    }

    /**
     * @return void
     */
    public function execute(): void
    {
        foreach ($this->modules as $module) {
            $module->execute();
        }
    }

    /**
     * @param Module $module
     * @param ReflectionMethod $method
     * @param array $params
     * @return bool
     * @throws ReflectionException
     */
    public function handleMethod(Module $module, ReflectionMethod $method, array $params): bool
    {
        $name = $method->getName();
        $args = $method->getParameters();

        if (count($args) != 1 || substr($name, 0, 3) != 'set') {
            return false;
        }

        $property = strtolower((substr($name, 3)));

        if (!isset($params[$property])) {
            return false;
        }

        $argClass = $args[0]->getClass();

        if (empty($argClass)) {
            $method->invoke($module, $params[$property]);
        } else {
            $method->invoke($module, $argClass->newInstance($params[$property]));
        }

        return true;
    }
}
