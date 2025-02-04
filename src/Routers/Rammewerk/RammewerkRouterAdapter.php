<?php

namespace Benchmark\Routers\Rammewerk;

use Benchmark\Generators\TestGenerator;
use Benchmark\Routers\AdapterInterface;
use Rammewerk\Router\Error\InvalidRoute;
use Rammewerk\Router\Router;


class RammewerkRouterAdapter implements AdapterInterface {


    private ?Router $router = null;



    public function initialize(): void {
        $this->router = new Router();
    }



    /**
     * @throws InvalidRoute
     */
    public function dispatch(string $path): string {
        return $this->router->dispatch($path);
    }



    public function registerClosureRoutes(array $tests): void {
        foreach ($tests as $test) {
            $this->router->add($test->registerPath, $test->closure)->disableReflection();
        }
    }



    public function registerClassRoutes(array $tests): void {
        foreach ($tests as $test) {
            $this->router->add($test->registerPath, $test->class)->classMethod($test->method);
        }
    }



    public function wildcardReplacements(string $path): string {
        return rtrim(TestGenerator::replaceWildcards($path, ['*', '*', '*']), '*/');
    }


}