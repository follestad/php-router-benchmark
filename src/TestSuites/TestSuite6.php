<?php

namespace Benchmark\TestSuites;

use Core\Setup\TestSuiteInterface;

class TestSuite6 implements TestSuiteInterface {

    public function getNumber(): int {
        return 6;
    }



    public function getTitle(): string {
        return "Router High-Load Dispatch Performance Test (Dynamic Routes)";
    }



    public function getDescription(): string {
        return <<<EOT
This test measures **how efficiently the router handles a high number of dispatches for dynamic routes**. It generates **100 routes** 
with up to **6 segments**, including **2 dynamic/wildcard segments**. After initialization and registration, each route is dispatched 
**500 times** to simulate extreme load conditions. The benchmark reflects the router’s ability to handle repeated requests efficiently 
under heavy usage.
EOT;
    }



    public function getFileName(): string {
        return 'test_suite_6';
    }


}