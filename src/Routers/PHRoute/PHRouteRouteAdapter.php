<?php

namespace Benchmark\Routers\PHRoute;

use Benchmark\Generators\TestGenerator;
use Benchmark\Routers\AdapterInterface;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;

class PHRouteRouteAdapter implements AdapterInterface {



    private ?RouteCollector $router = null;
    private ?Dispatcher $dispatcher = null;



    public function initialize(): void {
        $this->router = new RouteCollector();

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
        return new Dispatcher($this->router->getData())->dispatch('GET', $path);
    }



    public function wildcardReplacements(string $path): string {
        return TestGenerator::replaceWildcards($path, ['{one}', '{two}', '{three}']);
    }



}