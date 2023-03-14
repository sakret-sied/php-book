<?php

namespace Chapter04\Traits;

trait PersonBasic
{
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
