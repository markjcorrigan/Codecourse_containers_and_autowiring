<?php

/*
 * Prebuilt config file from the course
 */

namespace App\Config;

class Config{

    protected $config = [

        'app'=> [
            'name'=> 'codecourse'
        ],
        'db' => [
            'host' => '127.0.0.1',
            'database' => 'autowiring',
            'username' => 'root',
            'password' => 'password'
        ]
        ];

    public function __construct()
    {
        dump('init');
    }

        protected $cache = [];

        public function get ($key, $default = null)
        {
            if ($this->existsInCache($key)){
                return $this->fromCache($key);
            }

            return $this->addToCache(
                $key, $this->extractFromConfig($key)?? $default
            );
        }

        protected function extractFromConfig($key){

            $filtered = $this->config;

            foreach (explode('.', $key) as $segment) {
                if ( $this->exists($filtered, $segment) ) {
                    $filtered = $filtered[$segment];
                    continue;
                }
               
                return;
            }
            
            return $filtered;
        }

        protected function addToCache($key,$value){
            $this->cache[$key] = $value;

            return $value;
        }

        protected function fromCache($key){
            return $this->cache[$key];
        }

        protected function exists(array $config, $key){
            return array_key_exists($key,$config);
        }

        protected function existsInCache($key){
            return isset($this->cache[$key]);
        }
}