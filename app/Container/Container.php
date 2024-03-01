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

    public function share($name, callable $closure)
    {
        $this->items[$name] = function () use ($closure) {
            static $resolved;

            if (!$resolved) {
                $resolved = $closure($this);
            }
            return $resolved;
        };
    }


    public function has($name)
    {
        return isset($this->items[$name]);
    }


    public function get($name)
    {
        if ($this->has($name)) {
            return $this->items[$name]($this);
        }
        return $this->autowire($name);
    }

    /*
     * Note I switch out dumps as the v3 lecture proceeds.  Therefore, to anticipate this I have added all the code and will uncomment when I use a particular dump.
     */
    public function autowire($name)
    {
        if (!class_exists($name)) {
            throw new NotFoundException;
        }

//        $reflector = $this->getReflector($name);
//        dump($reflector);
//        dump($reflector->isInstantiable());
//        if (!$reflector->isInstantiable()) {
//            throw new NotFoundException;
//        }

//        dump($reflector->getConstructor());

//        if ($constructor = $reflector->getConstructor()) {
//            return $reflector->newInstanceArgs(
//                $this->getReflectorConstructorDependencies($constructor)
//            );

//            $dep = $this->getReflectorConstructorDependencies($constructor);

//
//            dump($dep);
//            die();

//        }
        return new $name();
    }


    public function __get($name)
    {
        return $this->get($name);
    }
}