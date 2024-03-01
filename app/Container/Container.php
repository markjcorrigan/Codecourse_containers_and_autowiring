<?php

namespace App\Container;

use App\ExceptionHandler;


/*
 * I built an exception handler that outputs via class NotFoundException.php to templates/exception.twig
 */
set_exception_handler(new ExceptionHandler());

class Container
{
    protected array $items = [];

    public function set($name, callable $closure)
    {
        $this->items[$name] = $closure;
    }

    public function get($name)
    {
        return $this->items[$name]();
    }
}