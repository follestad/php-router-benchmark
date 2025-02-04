<?php

namespace Benchmark\Routers\Bramus;

use Benchmark\Generators\TestGenerator;
use Benchmark\Routers\AdapterInterface;
use Bramus\Router\Router;

class BramusRouterAdapter implements AdapterInterface {

    private ?Router $router = null;



    public function initialize(): void {
        $this->router = new Router();
        $this->router->set404(function () {
            header('HTTP/1.1 404 Not Found');
            echo '404 Route Not Found';
            die;
        });
    }



    public function getResponseClass(): BramusResponseClass {
        return BramusResponseClass::getInstance();
    }



    public function registerClosureRoutes(array $tests): void {
        foreach ($tests as $test) {
            $this->router->get($test->registerPath, $test->closure);
        }
    }



    public function registerClassRoutes(array $tests): void {
        foreach ($tests as $test) {
            $this->router->get($test->registerPath, BramusClassSimple::class . '@' . $test->method);
        }
    }



    public function dispatch(string $path): string {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['REQUEST_URI'] = $path;
        $this->router->run();
        return BramusResponseClass::getInstance()->getContent()
            ?: throw new \RuntimeException("No response set for path: $path");
    }



    public function wildcardReplacements(string $path): string {
        return TestGenerator::replaceWildcards($path, ['(\w+)', '(\w+)', '(\w+)']);
    }



}