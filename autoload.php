<?php

spl_autoload_register(function (string $className) {
    require_once $className . '.php';
});
