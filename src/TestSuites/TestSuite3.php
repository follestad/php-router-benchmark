<?php

namespace Benchmark\TestSuites;

use Core\Setup\TestSuiteInterface;

class TestSuite3 implements TestSuiteInterface {

    public function getNumber(): int {
        return 3;
    }



    public function getTitle(): string {
        return "Router Dispatch Performance Test (Static Routes)";
    }



    public function getDescription(): string {
        return <<<EOT
This test measures how efficiently the router initializes, registers, and dispatches routes. It generates **100 static routes** 
with up to **5 segments** each and registers them as closure-based routes. However, **only a single predefined route is 
dispatched**, and this same route is used for all routers to ensure consistent results. The benchmark reflects the time 
taken for the **entire process**, including initializing the router, registering all routes, and dispatching 
**one specific route**.
EOT;
    }



    public function getFileName(): string {
        return 'test_suite_3';
    }


}