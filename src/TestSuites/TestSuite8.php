<?php

namespace Benchmark\TestSuites;

use Core\Setup\TestSuiteInterface;

class TestSuite8 implements TestSuiteInterface {

    public function getNumber(): int {
        return 8;
    }



    public function getTitle(): string {
        return "Router Class-Based Dispatch Performance Test (Dynamic Routes)";
    }



    public function getDescription(): string {
        return <<<EOT
This test measures **how efficiently the router handles class-based route dispatching**. It generates **100 routes** with up to **5 segments**, 
including **2 dynamic/wildcard segments**, and maps them to methods within a predefined class. After initialization and registration, 
each route is dispatched **200 times** to simulate repeated requests. The benchmark reflects the router’s performance in handling 
class-based route resolution under load.
EOT;
    }



    public function getFileName(): string {
        return 'test_suite_8';
    }


}