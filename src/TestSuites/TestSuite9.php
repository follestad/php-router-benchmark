<?php

namespace Benchmark\TestSuites;

use Core\Setup\TestSuiteInterface;

class TestSuite9 implements TestSuiteInterface {

    public function getNumber(): int {
        return 9;
    }



    public function getTitle(): string {
        return "Router Dispatch Performance Test (Dynamic Routes)";
    }



    public function getDescription(): string {
        return <<<EOT
This test is similar to **test suite 3**, but it features a path with **one dynamic segments**. The test registers multiple routes, 
but only dispatches **a single dynamic route** across all routers to ensure consistency. This setup helps gauge how well 
routers handle dynamic parameters during dispatch.
EOT;
    }



    public function getFileName(): string {
        return 'test_suite_9';
    }


}