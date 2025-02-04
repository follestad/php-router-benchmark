<?php

namespace Benchmark\Routers\FastRoute;

use Benchmark\Generators\TestGenerator;
use Benchmark\Routers\AdapterInterface;
use FastRoute\DataGenerator\GroupCountBased;
use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use FastRoute\RouteParser\Std;

class FastRouteRouteAdapter implements AdapterInterface {



    private ?Dispatcher $dispatcher = null;
    private ?RouteCollector $routeCollector = null;



    public function initialize(): void {
        $this->routeCollector = new RouteCollector(new Std(), new GroupCountBased());
        $this->dispatcher = new Dispatcher\GroupCountBased($this->routeCollector->getData());
    }



    public function registerClosureRoutes(array $tests): void {
        foreach ($tests as $test) {
            $this->routeCollector->addRoute('GET', $test->registerPath, $test->closure);
        }
    }



    public function registerClassRoutes(array $tests): void {
        foreach ($tests as $test) {
            $this->routeCollector->addRoute('GET', $test->registerPath, [$test->class, $test->method]);
        }
    }



    public function dispatch(string $path): string {
        $this->dispatcher = new Dispatcher\GroupCountBased($this->routeCollector->getData());
        $routeInfo = $this->dispatcher->dispatch('GET', $path);
        if (isset($routeInfo[1]) && $routeInfo[1] instanceof \Closure) {
            $handler = $routeInfo[1];
        } else {
            $handler = [new $routeInfo[1][0], $routeInfo[1][1]];
        }
        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                throw new \RuntimeException("Not found: $path");
            case Dispatcher::METHOD_NOT_ALLOWED:
                throw new \RuntimeException('Method not allowed');
            case Dispatcher::FOUND:
                return call_user_func_array($handler, $routeInfo[2]);
        }
    }



    public function wildcardReplacements(string $path): string {
        return TestGenerator::replaceWildcards($path, ['{one:\w+}', '{two:\w+}', '{three:\w+}']);
    }


}