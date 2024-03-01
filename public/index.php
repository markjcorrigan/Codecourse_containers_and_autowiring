<?php

use App\Config\Config;
use App\Container\Container;
use App\Database\Database;

require_once __DIR__ . '/../vendor/autoload.php';

$container = new Container;

$container->share('config', function() {
    return new Config;
});

$container->share('database', function ($container) {
    return new Database($container->config);
});

dump((new App\Controllers\HomeController($container->config, $container->database))->index());

