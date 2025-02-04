<?php

declare(strict_types=1);


namespace Core\Benchmark;

use Composer\InstalledVersions;
use Core\Setup\PackageDefinitionInterface;
use Core\Setup\TestSuiteInterface;
use RuntimeException;

final readonly class ReadmeGenerator {


    public function __construct(
        private string $readmeFilePath,
    ) {}



    private function ensureResultsDirExists(string $resultsDir): void {
        if (!is_dir($resultsDir) && !mkdir($resultsDir, 0777, true) && !is_dir($resultsDir)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $resultsDir));
        }
    }



    /**
     * @param TestSuiteInterface[] $testSuites
     * @param PackageDefinitionInterface[] $packageDefinitions
     * @param BenchmarkResult $benchmarkResult
     *
     * @return void
     */
    public function generate(array $testSuites, array $packageDefinitions, BenchmarkResult $benchmarkResult): void {

        $this->ensureResultsDirExists(dirname($this->readmeFilePath));

        $runTime = date('Y-m-d H:i:s');
        $phpVersion = PHP_VERSION;

        $readmeContent = <<<EOT
# Router Benchmark Tests

This benchmark suite evaluates the performance of various PHP router packages by testing their initialization, route 
registration, and dispatching efficiency under different conditions. The tests simulate real-world scenarios, 
measuring execution time and memory consumption.

## How the Benchmark Works

1. **Test Execution**  
   - Each router is tested across multiple predefined scenarios.  
   - Tests include both static and dynamic routes, with and without wildcards.  

2. **Performance Measurement**  
   - Each test is executed **20 times per router** to ensure consistent results.  
   - The **median execution time** is used to reduce the impact of outliers.  
   - Peak memory usage is recorded during execution.  

3. **Results and Ranking**  
   - The fastest router is ranked **#1** based on median execution time.  
   - A percentage comparison shows how each router performs relative to the fastest one.  
   - Memory usage is also measured and ranked.

## Test Structure

Each test follows a structured process:

- **Router Initialization** – The router is initialized before each test.  
- **Route Registration** – A predefined set of routes is registered.  
- **Request Dispatching** – The router processes test requests and returns responses.  
- **Result Validation** – The response is compared to the expected output to ensure correctness.  

## Output Format

The benchmark results are presented in a table with the following columns:

| Rank | Router | Time (ms) | Time (%) | Peak Memory (MB) | Memory (%) |
|------|--------|----------|---------|-----------------|-----------|
| 1    | FastRouter | 10.2  | 100%   | 1.2 MB         | 100%     |
| 2    | AnotherRouter | 12.5 | 122% | 1.4 MB         | 116%     |

- **Time (%)** compares execution time to the fastest router.  
- **Memory (%)** compares peak memory usage.  

## Why This Matters

Efficient routing is essential for high-performance web applications. By running standardized tests across different 
routers and using the median execution time, this benchmark provides a clear and objective comparison of their efficiency.

## Understanding Router Implementations

If you're curious about how different routers are implemented, check out the **`src/Routers`** directory. Some routers 
require minimal setup, while others need more extensive configuration. For example, Rammewerk Router has a compact 
and simple setup, whereas frameworks like Symfony and Laravel involve more steps. Some routers, like Bramus, 
required extra adjustments to fit the benchmark structure since there wasn’t a straightforward way to retrieve 
validated results. Exploring these implementations can give you insight into the trade-offs between simplicity and 
flexibility in different routing solutions.

## Contributing & Disclaimer

Want to contribute? Feel free to **fork the repository, add new router packages, or improve existing implementations** 
by submitting a pull request! 

You can find each package’s implementation under the **`src/Routers`** directory. Keep in 
mind that the test setups are based on official documentation and guides, but they may not always represent the 
**absolute best or most optimized configuration** for every router. Some routers required small adjustments to fit the 
test structure, but these should have minimal impact on performance. 

Additionally, some routers offer **caching or compilation features** to improve speed, but these haven't been tested 
yet—hopefully, a future test will cover this!

EOT;

        $readmeContent .= "## Packages\n\n";
        $readmeContent .= "| Name | Package | Version |\n";
        $readmeContent .= "|-----------|-------------|-----------|\n";

        $packages = array_map(static function (PackageDefinitionInterface $definition) {
            return [
                $definition->getName(),
                $definition->getPackageName(),
                InstalledVersions::getPrettyVersion($definition->getPackageName()),
                $definition->getUrl(),
            ];
        }, $packageDefinitions);

        foreach ($packages as [$name, $package, $version, $url]) {
            $readmeContent .= "| $name | [$package]($url) | $version |\n";
        }

        $readmeContent .= "\n\n## Benchmark Results\n\n";

        foreach ($testSuites as $i => $testSuite) {
            $testSuiteNumber = $i + 1;
            $testSuiteTitle = $testSuite->getTitle();
            $testSuiteDescription = $testSuite->getDescription();

            $readmeContent .= "\n\n### $testSuiteNumber. $testSuiteTitle \n\n";
            $readmeContent .= $testSuiteDescription . "\n\n";

            $readmeContent .= "| Rank | Container | Time (ms) | Time (%) | Peak Memory (MB) | Peak Memory (%) |\n";
            $readmeContent .= "| --- | ------------- | ------ | ------- | ------ | ------ |\n";

            $rank = 1;
            $timeBase = null;
            $memoryBase = null;

            foreach ($benchmarkResult->getResults($testSuite) as $containerName => $result) {
                if ($result->timeConsumptionInMilliSeconds() !== null) {
                    $time = sprintf('%.3F', $result->timeConsumptionInMilliSeconds());
                } else {
                    $time = null;
                }

                $memory = $result->peakMemoryUsageInMegaBytes();

                if ($rank === 1) {
                    $timeBase = $time ?? null;
                    $memoryBase = $memory ?? null;
                }

                $timeColumn = $time !== null ? round((float)$time, 3) : "N/A";
                $epsilon = 1e-10; // A small threshold to treat near-zero values as zero
                $timeBaseFloat = (float)$timeBase;
                $timePercentColumn = ($time !== null && abs($timeBaseFloat) > $epsilon) ? round((float)$time / $timeBaseFloat * 100) . "%" : "N/A";
                $memoryColumn = $memory !== null ? round($memory, 3) : "N/A";
                $memoryPercentColumn = $memory !== null && $memoryBase !== null ? round($memory / $memoryBase * 100) . "%" : "N/A";

                $readmeContent .= "| $rank | **$containerName** | $timeColumn | $timePercentColumn | $memoryColumn | $memoryPercentColumn |\n";

                $rank++;

            }



            file_put_contents($this->readmeFilePath, $readmeContent);

        }


    }


}