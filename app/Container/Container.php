<?php

namespace App\Container;

use App\Container\Exceptions\NotFoundException;
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

    public function has($name)
    {
        return isset($this->items[$name]);
    }


    public function get($name)
    {
        if (!$this->has($name))
        {
            throw new NotFoundException('Some text');
        }
        return $this->items[$name]();
    }
}