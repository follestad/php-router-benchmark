<?php

namespace Benchmark\Routers;


use Benchmark\Generators\ClassTest;
use Benchmark\Generators\ClosureTest;

interface AdapterInterface {


    public function wildcardReplacements(string $path): string;



    public function initialize(): void;



    public function dispatch(string $path): string;



    /**
     * @param ClosureTest[] $paths
     *
     * @return void
     */
    public function registerClosureRoutes(array $tests): void;



    /**
     * @param ClassTest[] $tests
     *
     * @return void
     */
    public function registerClassRoutes(array $tests): void;



}