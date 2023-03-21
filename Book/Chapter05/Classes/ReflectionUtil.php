<?php

namespace Book\Chapter05\Classes;

use ReflectionClass;

class ReflectionUtil
{
    /**
     * @param ReflectionClass $class
     * @return string
     */
    public static function getClassSource(ReflectionClass $class): string
    {
        $path = $class->getFileName();
        $lines = file($path);
        $from = $class->getStartLine();
        $to = $class->getEndLine();
        $length = $to - $from + 1;
        return implode(array_slice($lines, $from - 1, $length));
    }
}
