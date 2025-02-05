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

$cacheFile = 'test_6.json';

if (FileSaver::exist($cacheFile)) {
    $tests = FileSaver::load($cacheFile);
} else {
    /** @var array<int, array{path: string, wildcard_path: string, result: string}> $paths */
    $tests = TestGenerator::generatePaths(100, 6, 2);
    FileSaver::save($cacheFile, $tests);
}


/*
|--------------------------------------------------------------------------
| Generate handler
|--------------------------------------------------------------------------
*/

if ($adapter instanceof \Benchmark\Routers\Bramus\BramusRouterAdapter) {
    $response = $adapter->getResponseClass();
    $tests = array_map(static function (array $test) use ($response) {
        $test['closure'] = static function (string $one, string $two) use ($response): string {
            $response->setContent($one . $two);
            return $one . $two;
        };
        return $test;
    }, $tests);
}

if ($adapter instanceof \Benchmark\Routers\Klein\KleinRouterAdapter) {
    $tests = array_map(static function (array $test) {
        $test['closure'] = static function (\Klein\Request $request): string {
            /** @noinspection PhpUndefinedFieldInspection */
            return $request->one . $request->two;
        };
        return $test;
    }, $tests);
}


$tests = TestGenerator::generateClosureTests(
    $tests,
    $adapter,
    static fn(string $one, string $two): string => $one . $two,
);


/*
|--------------------------------------------------------------------------
| Pre Benchmark
|--------------------------------------------------------------------------
*/

gc_collect_cycles();
memory_reset_peak_usage();

$adapter->initialize();
$adapter->registerClosureRoutes($tests);


/*
|--------------------------------------------------------------------------
| Run Benchmark
|--------------------------------------------------------------------------
*/

$timeStart = hrtime(true);


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

