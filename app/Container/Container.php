<?php

namespace App\Container;

use App\ExceptionHandler;



set_exception_handler(new ExceptionHandler());

class Container
{
    protected array $items = [];

}