<?php

namespace Book\Chapter04\Classes;

use Book\Chapter04\Traits\PersonBasic;

class Person2
{
    use PersonBasic;

    /**
     * @param \Book\Chapter04\Interfaces\PersonWriter $writer
     * @return void
     */
    public function output(\Book\Chapter04\Interfaces\PersonWriter $writer)
    {
        $writer->write($this);
    }
}
