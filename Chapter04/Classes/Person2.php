<?php

namespace Chapter04\Classes;

use Chapter04\Traits\PersonBasic;

class Person2
{
    use PersonBasic;

    /**
     * @param \Chapter04\Interfaces\PersonWriter $writer
     * @return void
     */
    public function output(\Chapter04\Interfaces\PersonWriter $writer)
    {
        $writer->write($this);
    }
}
