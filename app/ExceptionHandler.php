<?php

namespace App;

//use Psr\Http\Message\ServerRequestInterface as Request;
//use Psr\Http\Message\ResponseInterface as Response;
//use Slim\Views\Twig;
use Throwable;

class ExceptionHandler
{
    public function __invoke(Throwable $e): void
    {
//
//
//        echo "<h1>Fatal error</h1>";
//        echo "<p>Uncaught exception: '" . get_class($e) . "'</p>";
//        echo "<p>Message: '" . $e->getMessage() . "'</p>";
//        echo "<p>Stack trace:<pre>" . $e->getTraceAsString() . "</pre>";
//        echo "<p>Thrown in '" . $e->getFile() . "' on line " . $e->getLine() . "</p>";
        require(__DIR__ . '/../templates/exception.twig');
    }
}
