<?php

use App\Config\Config;
use App\Container\Container;

require_once __DIR__ . '/../vendor/autoload.php';

$container = new Container;

$container->set('config', function() {
    return new Config;
});

dump($container->config->get('app.name'));
dump($container->config->get('app.name'));
dump($container->config->get('app.name'));