<?php

namespace App\Container\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    public function run(): void
    {
        require(__DIR__ . '/../../../templates/exception.twig');
    }
}
