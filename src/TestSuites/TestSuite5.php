<?php

namespace Benchmark\TestSuites;

use Core\Setup\TestSuiteInterface;

class TestSuite5 implements TestSuiteInterface {

    public function getNumber(): int {
        return 5;
    }



    public function getTitle(): string {
        return "Router Repeated Dispatch Performance Test (Dynamic Routes)";
    }



    public function getDescription(): string {
        return <<<EOT
This test measures **how efficiently the router handles repeated dispatches of dynamic routes**. It generates **100 routes** 
with up to **6 segments**, including **2 dynamic/wildcard segments**. After initialization and registration, **each route** is dispatched 
**100 times** to simulate repeated access patterns. The benchmark reflects the total time taken for the **entire process**, 
focusing on the cost of repeated dynamic route handling.
EOT;
    }



    public function getFileName(): string {
        return 'test_suite_5';
    }


}