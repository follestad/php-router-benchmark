<?php

namespace Benchmark\Routers\Nette;

use Benchmark\Routers\AdapterInterface;

use Benchmark\Generators\TestGenerator;
use Nette\Routing\Route;
use Nette\Routing\RouteList;
use Nette\Http\RequestFactory;
use Nette\Http\Request;

class NetteRouterAdapter implements AdapterInterface {

    private ?RouteList $router = null;
    private ?Request $request = null;



    public function initialize(): void {
        $this->router = new RouteList();
        $this->request = new RequestFactory()->fromGlobals();
    }



    public function registerClosureRoutes(array $tests): void {
        foreach ($tests as $test) {
            $this->router->addRoute($test->registerPath, [
                'controller' => $test->closure,
            ]);
        }
    }



    public function registerClassRoutes(array $tests): void {
        foreach ($tests as $test) {
            $this->router->addRoute($test->registerPath, [
                'controller' => $test->class,
                'action'     => $test->method,
            ]);
        }
    }



    public function dispatch(string $path): string {
        $this->request = $this->request->withUrl(new \Nette\Http\UrlScript($path));
        $params = $this->router->match($this->request);

        $handler = $params['controller'];
        unset($params['controller']);

        if (isset($params['action'])) {
            $handler = [new $handler, $params['action']];
            unset($params['action']);
        }

        return call_user_func_array($handler, $params);

    }



    public function wildcardReplacements(string $path): string {
        return TestGenerator::replaceWildcards($path, ['<one \w+>', '<two \w+>', '<three \w+>']);
    }


}