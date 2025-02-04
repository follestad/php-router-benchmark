<?php

declare(strict_types=1);

use Benchmark\Packages;
use Benchmark\TestSuites;
use Core\Benchmark\Benchmark;
use Core\Benchmark\ReadmeGenerator;
use Core\Utilities\Color;

// Prep benchmark system
const ROOT_DIR = __DIR__ . '/../';
require ROOT_DIR . 'vendor/autoload.php';
ini_set("memory_limit", "256M");

// Get all test suites that should be run in the benchmark
$testSuites = TestSuites::getAll();

// Get all package definitions that should be used in the benchmark
$packageDefinitions = new Packages()->getAllDefinitions();

// Load the output generator
$outputGenerator = new ReadmeGenerator(ROOT_DIR . 'result/readme.md');

// Run the benchmark
$benchmark = new Benchmark();
$benchmark->run($testSuites, $packageDefinitions, $outputGenerator);

Color::print("Benchmark completed. Results saved to readme file under result directory", [
    Color::GREEN,
    Color::BOLD,
]);