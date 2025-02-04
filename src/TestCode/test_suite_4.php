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

$cacheFile = 'test_4.json';

if (FileSaver::exist($cacheFile)) {
    $tests = FileSaver::load($cacheFile);
} else {
    /** @var array<int, array{path: string, wildcard_path: string, result: string}> $paths */
    $tests = TestGenerator::generatePaths(50, 4, 1);
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
        $test['closure'] = static function (string $one) use ($response): string {
            $response->setContent($one);
            return $one;
        };
        return $test;
    }, $tests);
}

if ($adapter instanceof \Benchmark\Routers\Klein\KleinRouterAdapter) {
    $tests = array_map(static function (array $test) {
        $test['closure'] = static function (\Klein\Request $request): string {
            /** @noinspection PhpUndefinedFieldInspection */
            return $request->one;
        };
        return $test;
    }, $tests);
}

$tests = TestGenerator::generateClosureTests(
    $tests,
    $adapter,
    static fn(string $one): string => $one,
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

$adapter->registerClosureRoutes($tests);

foreach ($tests as $test) {
    $response = $adapter->dispatch($test->path);
    if ($response !== $test->result) {
        return Result::unsuccessful("Response mismatch. Expected: $test->result Got: $response");
    }
}

$timeEnd = hrtime(true);
return Result::fromMeasurement($timeStart, $timeEnd, memory_get_peak_usage());

