<?php

namespace Benchmark;


use Benchmark\TestSuites\TestSuite1;
use Benchmark\TestSuites\TestSuite2;
use Benchmark\TestSuites\TestSuite3;
use Benchmark\TestSuites\TestSuite4;
use Benchmark\TestSuites\TestSuite5;
use Benchmark\TestSuites\TestSuite6;
use Benchmark\TestSuites\TestSuite7;
use Benchmark\TestSuites\TestSuite8;
use Core\Setup\TestSuiteInterface;

final class TestSuites {

    /**
     * Return all test suites that should be run in the benchmark
     *
     * @return TestSuiteInterface[]
     */
    public static function getAll(): array {
        return [
            new TestSuite1(),
            new TestSuite2(),
            new TestSuite3(),
            new TestSuite4(),
            new TestSuite5(),
            new TestSuite6(),
            new TestSuite7(),
            new TestSuite8(),
        ];
    }



    public static function getTestSuite(int $number): ?TestSuiteInterface {
        return match ($number) {
            1       => new TestSuite1(),
            2       => new TestSuite2(),
            3       => new TestSuite3(),
            4       => new TestSuite4(),
            5       => new TestSuite5(),
            6       => new TestSuite6(),
            7       => new TestSuite7(),
            8       => new TestSuite8(),
            default => null,
        };
    }


}