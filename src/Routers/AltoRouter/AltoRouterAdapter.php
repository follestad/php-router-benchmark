<?php

namespace Benchmark\Routers\AltoRouter;

use Benchmark\Generators\TestGenerator;
use Benchmark\Routers\AdapterInterface;

class AltoRouterAdapter implements AdapterInterface {

    private ?\AltoRouter $router = null;



    public function initialize(): void {
        $this->router = new \AltoRouter();
    }



    public function registerClosureRoutes(array $tests): void {
        foreach ($tests as $test) {
            $this->router->map('GET', $test->registerPath, $test->closure);
        }
    }



    public function registerClassRoutes(array $tests): void {
        foreach ($tests as $test) {
            $this->router->map('GET', $test->registerPath, [$test->class, $test->method]);
        }
    }



    public function dispatch(string $path): string {

        $match = $this->router->match($path, 'GET');

        if (is_array($match)) {
            if ($match['target'] instanceof \Closure) {
                return call_user_func_array($match['target'], $match['params']);
            }
            return call_user_func_array([new $match['target'][0], $match['target'][1]], $match['params']);
        }

        throw new \RuntimeException("No route was matched: $path");

    }



    public function wildcardReplacements(string $path): string {
        return TestGenerator::replaceWildcards($path, ['[:one]', '[:two]', '[:three]']);
    }


}