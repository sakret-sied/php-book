<?php

namespace Chapter04\Classes;

use Classes\OutputHelper;
use Exception;

class ProcessSale
{
    /** @var array */
    private array $callbacks = [];

    /**
     * @param callable $callback
     * @return void
     * @throws Exception
     */
    public function registerCallback(callable $callback): void
    {
        if (!is_callable($callback)) {
            throw new Exception('Функция обратного вызова - невызываемая!');
        }
        $this->callbacks[] = $callback;
    }

    /**
     * @param Product $product
     * @return void
     */
    public function sale(Product $product): void
    {
        OutputHelper::echoText("$product->name: обрабатывается...");
        foreach ($this->callbacks as $callback) {
            call_user_func($callback, $product);
        }
    }
}
