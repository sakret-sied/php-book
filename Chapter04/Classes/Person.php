<?php

namespace Chapter04\Classes;

class Person
{
    /**
     * @param string $property
     * @return mixed
     */
    public function __get(string $property)
    {
        $method = "get{$property}";
        if (method_exists($this, $method)) {
            return $this->$method();
        }
        return null;
    }

    /**
     * @param string $property
     * @return bool
     */
    public function __isset(string $property): bool
    {
        $method = "get$property";
        return method_exists($this, $method);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'Иван';
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return 44;
    }
}
