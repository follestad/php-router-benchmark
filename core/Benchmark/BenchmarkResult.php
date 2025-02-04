<?php

namespace Core\Benchmark;


use Core\Setup\PackageDefinitionInterface;
use Core\Setup\Result;
use Core\Setup\TestSuiteInterface;
use InvalidArgumentException;

class BenchmarkResult {

    /** @var mixed[] */
    private array $testResults = [];



    public function addTestResult(
        TestSuiteInterface $testSuite,
        PackageDefinitionInterface $container,
        Result $result,
    ): void {
        $containerName = $container->getDisplayName();
        $testSuiteNumber = $testSuite->getNumber();

        $this->testResults[$testSuiteNumber][$containerName][] = $result;
    }



    public function getResult(TestSuiteInterface $testSuite, string $containerName): Result {
        $testSuiteNumber = $testSuite->getNumber();

        if (isset($this->testResults[$testSuiteNumber][$containerName]) === false) {
            throw new InvalidArgumentException("No result with the given parameters exists");
        }

        return $this->calculateResults($this->testResults[$testSuiteNumber][$containerName]);
    }



    /**
     * @return Result[]
     */
    public function getResults(TestSuiteInterface $testSuite): array {
        $testSuiteNumber = $testSuite->getNumber();

        if (isset($this->testResults[$testSuiteNumber]) === false) {
            return [];
        }

        $results = array_map(function ($containerResults) {
            return $this->calculateResults($containerResults);
        }, $this->testResults[$testSuiteNumber]);

        uasort($results, static function (Result $a, Result $b): int {
            if ($a->timeConsumptionInMilliSeconds() === null && $b->timeConsumptionInMilliSeconds() !== null) {
                return 1;
            }

            if ($a->timeConsumptionInMilliSeconds() !== null && $b->timeConsumptionInMilliSeconds() === null) {
                return -1;
            }

            return $a->timeConsumptionInMilliSeconds() <=> $b->timeConsumptionInMilliSeconds();
        });

        return $results;
    }



    /**
     * @param Result[] $containerResults
     */
    private function calculateResults(array $containerResults): Result {
        $timeResults = [];
        $memoryResults = [];
        foreach ($containerResults as $item) {
            $timeResults[] = $item->timeConsumptionInMilliSeconds();
            $memoryResults[] = $item->peakMemoryUsageInMegaBytes();
        }

        return Result::fromValues(
            $this->getMedian($timeResults),
            $this->getMedian($memoryResults),
        );
    }



    /**
     * @param array<int, float|null> $results
     */
    private function getMedian(array $results): ?float {
        if ($results === [] || $results[0] === null) {
            return null;
        }

        sort($results, SORT_NUMERIC);

        $count = count($results);
        $middleIndex = $count / 2;

        assert($results[$middleIndex] !== null);
        assert($results[$middleIndex + 1] !== null);

        if ($count % 2 === 0) {
            $median = ($results[$middleIndex] + $results[$middleIndex + 1]) / 2;
        } else {
            $median = $results[$middleIndex];
        }

        return round($median, 5);
    }


}