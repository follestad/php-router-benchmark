<?php

use Benchmark\Generators\TestGenerator;
use Benchmark\Routers\AdapterInterface;
use Core\Setup\Result;
use Core\Utilities\FileSaver;

/** @var AdapterInterface $adapter */

/*
|--------------------------------------------------------------------------
| Generate Test Paths With Wildcards
|--------------------------------------------------------------------------
| Test paths are generated and loaded from cache to ensure consistency.
| Meaning, all packages are using the same paths and structure.
*/

$cacheFile = 'test_8.json';

if (FileSaver::exist($cacheFile)) {
    $tests = FileSaver::load($cacheFile);
} else {
    /** @var array<int, array{path: string, wildcard_path: string, result: string}> $paths */
    $tests = TestGenerator::generatePaths(100, 5, 2);
    FileSaver::save($cacheFile, $tests);
}


/*
|--------------------------------------------------------------------------
| Generate handler
|--------------------------------------------------------------------------
*/

$tests = TestGenerator::generateClassTests(
    $tests,
    2,
    $adapter,
);


/*
|--------------------------------------------------------------------------
| Run Benchmark
|--------------------------------------------------------------------------
*/


gc_collect_cycles();
memory_reset_peak_usage();
$timeStart = hrtime(true);


$adapter->initialize();
$adapter->registerClassRoutes($tests);

for ($i = 0; $i < 200; $i++) {
    foreach ($tests as $test) {
        $response = $adapter->dispatch($test->path);
        if ($response !== $test->result) {
            return Result::unsuccessful("Response mismatch. Expected: $test->result Got: $response");
        }
    }
}


$timeEnd = hrtime(true);
return Result::fromMeasurement($timeStart, $timeEnd, memory_get_peak_usage());

