<?php

namespace Benchmark\Routers\Laravel;

use Benchmark\Generators\TestGenerator;
use Benchmark\Routers\AdapterInterface;

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Routing\Contracts\CallableDispatcher;
use Illuminate\Routing\Router;
use Illuminate\Http\Request;
use RuntimeException;


class LaravelRouteAdapter implements AdapterInterface {

    private ?Request $request = null;
    private ?Router $router = null;



    public function initialize(): void {
        // Create a service container
        $container = new Container;
        $container->bind(CallableDispatcher::class, \Illuminate\Routing\CallableDispatcher::class);

        // Create a request from server variables, and bind it to the container; optional
        $this->request = Request::capture();
        $container->instance(Request::class, $this->request);

        // Using Illuminate/Events/Dispatcher here (not required); any implementation of
        // Illuminate/Contracts/Event/Dispatcher is acceptable
        $events = new Dispatcher($container);

        // Create the router instance
        $this->router = new Router($events, $container);
    }



    public function registerClosureRoutes(array $tests): void {
        // Sort routes: Specific before Generic
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
        $this->request = $this->request->duplicate();
        $this->request->server->set('REQUEST_URI', $path);
        return $this->router->dispatch($this->request)->getContent() ?: throw new RuntimeException("Unable to get string response");
    }



    public function wildcardReplacements(string $path): string {
        return TestGenerator::replaceWildcards($path, ['{one}', '{two}', '{three}']);
    }



}