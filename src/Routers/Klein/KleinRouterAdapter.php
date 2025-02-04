<?php

namespace Benchmark\Routers\Klein;

use Benchmark\Generators\TestGenerator;
use Benchmark\Routers\AdapterInterface;
use Klein\Klein;
use Klein\Request;
use Klein\Response;

class KleinRouterAdapter implements AdapterInterface {

    private ?Klein $router = null;
    private ?Request $request = null;



    public function initialize(): void {
        $this->router = new Klein();
        $this->request = Request::createFromGlobals();
    }



    public function registerClosureRoutes(array $tests): void {
        foreach ($tests as $test) {
            $this->router->respond('GET', $test->registerPath, $test->closure);
        }
    }



    public function registerClassRoutes(array $tests): void {
        foreach ($tests as $test) {
            $this->router->respond('GET', $test->registerPath, [KleinSimpleClass::class, $test->method]);
        }
    }



    public function dispatch(string $path): string {
        $this->request->server()->set('REQUEST_URI', $path);
        $this->router->dispatch($this->request, capture: Klein::DISPATCH_CAPTURE_AND_RETURN);
        return $this->router->response()->body();
    }



    public function wildcardReplacements(string $path): string {
        return TestGenerator::replaceWildcards($path, ['[:one]', '[:two]', '[:three]']);
    }



}