<?php

namespace Core\Setup;

use Benchmark\Packages;
use Benchmark\TestSuites;
use LogicException;
use Throwable;

class TestRunner {



    private Packages $definitions;



    public function __construct() {
        $this->definitions = new Packages();
    }



    public function run(string $package_name, int $suite): Result {

        $definition = $this->definitions->getDefinition($package_name)
            ?? throw new LogicException("Package \"$package_name\" doesn't exist");

        $testSuite = TestSuites::getTestSuite($suite)
            ?? throw new LogicException("Test suite \"$suite\" doesn't exist");

        $adapter = $definition->getAdapter();

        try {
            return require PROJECT_ROOT . "src/TestCode/{$testSuite->getFileName()}.php";
        } catch (Throwable $exception) {
            return new Result(message: $exception->getMessage());
        }


    }


}