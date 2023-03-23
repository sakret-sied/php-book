<?php

namespace Book\Chapter05\Tasks;

use Core\Classes\OutputHelper;

class Task
{
    /**
     * @return void
     */
    public function doSpeak(): void
    {
        OutputHelper::echoText('Привет', 2);
    }
}
