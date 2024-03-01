<?php

namespace App\Controllers;

use App\Config\Config;
use App\Database\Database;


class HomeController
{
    protected $config;
    protected $database;

    public function __construct(Config $config, Database $database)
    {
        $this->config = $config;
        $this->database = $database;
    }

    public function index()
    {
        return [
            $this->config->get('app.name'),
            $this->database->connect()
        ];
    }
}
