<?php

namespace Benchmark\Routers\Sharkk;

use Benchmark\Generators\TestGenerator;
use Benchmark\Routers\AdapterInterface;
use Sharkk\Router\SegmentRouter;

class SharkkRouterAdapter implements AdapterInterface {

    private ?SegmentRouter $router = null;



    public function initialize(): void {
        $this->router = new SegmentRouter();
    }



    public function dispatch(string $path): string {
        $result = $this->router->lookup('GET', $path);
        return call_user_func_array($result['handler'], $result['params']);
    }



    public function registerClosureRoutes(array $tests): void {
        foreach ($tests as $test) {
            $this->router->add('GET', $test->registerPath, $test->closure);
        }
    }



    public function registerClassRoutes(array $tests): void {
        foreach ($tests as $test) {
            $this->router->add('GET', $test->registerPath, [new $test->class, $test->method]);
        }
    }



    public function wildcardReplacements(string $path): string {
        return TestGenerator::replaceWildcards($path, [':one', ':two', ':three']);
    }



}