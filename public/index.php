<?php

use App\Config\Config;
use App\Container\Container;
use App\Controllers\HomeController;
use App\Database\Database;

require_once __DIR__ . '/../vendor/autoload.php';

$container = new Container;

// v3_00.19
//$container->share('config', function() {
//    return new Config;
//});

$container->share(Database::class, function ($container) {
    return new Database($container->get(Config::class));
});

$container->get(HomeController::class)->index();



