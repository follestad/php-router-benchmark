<?php

namespace Benchmark\Routers\Jaunt;

use Benchmark\Generators\TestGenerator;
use Benchmark\Routers\AdapterInterface;
use Closure;
use Jaunt\Router;

class JauntRouterAdapter implements AdapterInterface {

    private ?Router $router = null;

    public function initialize(): void {
        $this->router = new Router();
    }



    public function registerClosureRoutes(array $tests): void {
        foreach ($tests as $test) {
            $this->router->get($test->registerPath, $test->closure);
        }
    }



    public function registerClassRoutes(array $tests): void {
        foreach ($tests as $test) {
            $this->router->get($test->registerPath, [$test->class, $test->method]);
        }
    }



    public function dispatch(string $path): string {
        $route = $this->router->match('GET', $path);

        if (isset($route['stack'][0]) && $route['stack'][0] instanceof Closure) {
            $handler = $route['stack'][0];
        } else {
            $handler = [new $route['stack'][0][0](), $route['stack'][1][1]];
        }
        return call_user_func_array($handler, array_values($route['params']));
    }


    public function wildcardReplacements(string $path): string {
        return TestGenerator::replaceWildcards($path, [':one', ':two:', ':three']);
    }
}