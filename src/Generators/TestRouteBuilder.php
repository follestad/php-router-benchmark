<?php

namespace Benchmark\Generators;

use Nyholm\Psr7\Response;
use Nyholm\Psr7\ServerRequest;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TestRouteBuilder {


    public static function build(array $paths, int $middlewareCount = 0): array {
        $replacedPaths = array_map(static function ($path) {
            return str_replace(['!D!', '!S!'], ['56', 'Johnny'], $path);
        }, $paths);
        return [
            $replacedPaths,
            self::buildRoutes($paths, $replacedPaths),
            self::buildMiddlewares($middlewareCount),
            self::buildRequestPaths($replacedPaths),
        ];
    }



    private static function buildRoutes(array $paths, array $replacedPaths): array {
        $routes = [];
        foreach ($paths as $i => $path) {
            $result = $replacedPaths[$i] ?? $path;
            $routes[$path] = static function (ServerRequestInterface $request) use ($result): ResponseInterface {
                return new Response(200, [], $result)->withHeader('X-MiddlewareCount', $request->getAttribute('middlewareCount', 0));
            };
        }
        return $routes;
    }



    private static function buildMiddlewares(int $middlewareCount): array {
        $middlewares = [];
        for ($i = 0; $i < $middlewareCount; $i++) {
            $middlewares[] = new class() implements MiddlewareInterface {

                public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface {
                    $count = $request->getAttribute('middlewareCount', 0);
                    return $handler->handle($request->withAttribute('middlewareCount', $count + 1));
                }


            };
        }
        return $middlewares;
    }



    private static function buildRequestPaths(array $paths): array {
        $requestPaths = [];
        foreach ($paths as $path) {
            $requestPaths[$path] = new ServerRequest('GET', $path);
        }
        return $requestPaths;
    }



}