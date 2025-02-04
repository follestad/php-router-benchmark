<?php

namespace Benchmark\TestSuites;

use Core\Setup\TestSuiteInterface;

class TestSuite2 implements TestSuiteInterface {

    public function getNumber(): int {
        return 2;
    }



    public function getTitle(): string {
        return "Router Initialization and Route Registration Performance Test";
    }



    public function getDescription(): string {
        return <<<EOT
This test measures **how efficiently the router initializes and registers routes**. It generates **50 static routes** with up to **5 segments** each 
and registers them as closure-based routes. The benchmark runs **50 iterations**, where the router is initialized and routes are registered in each iteration. 
The total time reflects how fast the router can complete this process **50 times**.
EOT;
    }



    public function getFileName(): string {
        return 'test_suite_2';
    }


}