<?php

namespace Benchmark\Routers\Symfony;

use Benchmark\Generators\TestGenerator;
use Benchmark\Routers\AdapterInterface;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class SymfonyRouterAdapter implements AdapterInterface {

    private RouteCollection $routes;
    private RequestContext $context;
    private UrlMatcher $matcher;



    public function initialize(): void {
        $this->routes = new RouteCollection();
        $this->context = new RequestContext();
    }



    public function registerClosureRoutes(array $tests): void {
        foreach ($tests as $test) {
            $this->routes->add($test->registerPath, new Route($test->registerPath, ['_controller' => $test->closure]));
        }
        $this->matcher = new UrlMatcher($this->routes, $this->context);
    }



    public function registerClassRoutes(array $tests): void {
        foreach ($tests as $test) {
            $this->routes->add($test->registerPath, new Route($test->registerPath, ['_controller' => [new $test->class, $test->method]]));
        }
        $this->matcher = new UrlMatcher($this->routes, $this->context);
    }



    public function dispatch(string $path): string {
        $parameters = $this->matcher->match($path);
        $callback = $parameters['_controller'];
        unset($parameters['_controller'], $parameters['_route']);
        return $callback(...array_values($parameters));
    }



    public function wildcardReplacements(string $path): string {
        return TestGenerator::replaceWildcards($path, ['{one}', '{two}', '{three}']);
    }



}