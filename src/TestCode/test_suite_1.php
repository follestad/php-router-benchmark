<?php

/** @var AdapterInterface $adapter */

use Benchmark\Routers\AdapterInterface;
use Core\Setup\Result;

/*
|--------------------------------------------------------------------------
| Run Benchmark
|--------------------------------------------------------------------------
*/

gc_collect_cycles();
memory_reset_peak_usage();
$timeStart = hrtime(true);



for ($i = 0; $i < 1000; $i++) {
    $adapter->initialize();
}


$timeEnd = hrtime(true);
return Result::fromMeasurement($timeStart, $timeEnd, memory_get_peak_usage());