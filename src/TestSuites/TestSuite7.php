<?php

namespace Benchmark\TestSuites;

use Core\Setup\TestSuiteInterface;

class TestSuite7 implements TestSuiteInterface {

    public function getNumber(): int {
        return 7;
    }



    public function getTitle(): string {
        return "Router Large-Scale Route Handling Performance Test";
    }



    public function getDescription(): string {
        return <<<EOT
This test measures **how efficiently the router handles a large number of registered routes**. It generates **1,500 routes** 
with up to **6 segments**, including **2 dynamic/wildcard segments**. After initialization and registration, each route is dispatched 
once to validate its response. The benchmark reflects the router’s performance in handling a high volume of routes efficiently.
EOT;
    }



    public function getFileName(): string {
        return 'test_suite_7';
    }


}