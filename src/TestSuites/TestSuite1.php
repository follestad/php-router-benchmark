<?php

namespace Benchmark\TestSuites;

use Core\Setup\TestSuiteInterface;

class TestSuite1 implements TestSuiteInterface {

    public function getNumber(): int {
        return 1;
    }



    public function getTitle(): string {
        return "Router Initialization Performance Test";
    }



    public function getDescription(): string {
        return <<<EOT
This test measures **how quickly the router initializes** when called **1000 times**. It helps determine the overhead of 
setting up the router repeatedly. A slower result here could indicate an expensive initialization process.
EOT;
    }



    public function getFileName(): string {
        return 'test_suite_1';
    }


}