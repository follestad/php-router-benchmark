<?php

namespace Benchmark\TestSuites;

use Core\Setup\TestSuiteInterface;

class TestSuite4 implements TestSuiteInterface {

    public function getNumber(): int {
        return 4;
    }



    public function getTitle(): string {
        return "Router Dispatch Performance Test (Dynamic Routes)";
    }



    public function getDescription(): string {
        return <<<EOT
This test measures **how efficiently the router initializes, registers, and dispatches dynamic routes**. It generates **50 routes** 
with up to **4 segments**, including **one dynamic/wildcard segment**. After registration, each route is dispatched and its response 
is validated. The benchmark reflects the total time taken for the **entire process**, from initialization to handling dynamic routes.
EOT;
    }



    public function getFileName(): string {
        return 'test_suite_4';
    }


}