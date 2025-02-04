<?php

use Benchmark\Generators\TestGenerator;
use Benchmark\Routers\AdapterInterface;
use Benchmark\Routers\Bramus\BramusRouterAdapter;
use Core\Setup\PackageDefinitionInterface;
use Core\Setup\Result;
use Core\Utilities\FileSaver;

/**
 * @var AdapterInterface $adapter
 */

/*
|--------------------------------------------------------------------------
| Generate Test Paths With Wildcards
|--------------------------------------------------------------------------
| Test paths are generated and loaded from cache to ensure consistency.
| Meaning, all packages are using the same paths and structure.
*/

$cacheFile = 'test_3.json';

if (FileSaver::exist($cacheFile)) {
    $tests = FileSaver::load($cacheFile);
} else {
    /** @var array<int, array{path: string, wildcard_path: string, result: string}> $paths */
    $tests = TestGenerator::generatePaths(100, 5, 0);
    FileSaver::save($cacheFile, $tests);
}

/*
|--------------------------------------------------------------------------
| Generate handler
|--------------------------------------------------------------------------
*/

if ($adapter instanceof BramusRouterAdapter) {
    $response = $adapter->getResponseClass();
    $tests = array_map(static function (array $test) use ($response) {
        $path = $test['path'];
        $test['closure'] = static function () use ($response, $path): string {
            $response->setContent($path);
            return $path;
        };
        return $test;
    }, $tests);
}


$tests = TestGenerator::generateClosureTests(
    $tests,
    $adapter,
);


/*
|--------------------------------------------------------------------------
| Run Benchmark
|--------------------------------------------------------------------------
*/

$randomRoute = $tests[4];

gc_collect_cycles();
memory_reset_peak_usage();
$timeStart = hrtime(true);

$adapter->initialize();
$adapter->registerClosureRoutes($tests);

$response = $adapter->dispatch($randomRoute->path);
if ($response !== $randomRoute->path) {
    return Result::unsuccessful("Response mismatch. Expected: $randomRoute->path Got: $response");
}

$timeEnd = hrtime(true);
return Result::fromMeasurement($timeStart, $timeEnd, memory_get_peak_usage());

