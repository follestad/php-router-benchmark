<?php

namespace Core\Benchmark;

use Core\Setup\PackageDefinitionInterface;
use Core\Setup\Result;
use Core\Setup\TestSuiteInterface;
use Core\Utilities\Color;

final class Benchmark {

    /**
     * @param TestSuiteInterface[] $testSuites
     * @param PackageDefinitionInterface[] $packages
     * @param ReadmeGenerator $outputGenerator
     *
     * @return void
     */
    public function run(array $testSuites, array $packages, ReadmeGenerator $outputGenerator): void {
        $result = new BenchmarkResult();

        foreach ($testSuites as $suite) {
            foreach ($packages as $package) {
                $this->runTestSuite($suite, $package, $result);
            }
        }

        Color::print("Generating results...", [Color::LIGHT_GREEN]);
        $outputGenerator->generate($testSuites, $packages, $result);
        Color::print("Benchmark finished successfully", [Color::LIGHT_GREEN]);
    }



    private function runTestSuite(
        TestSuiteInterface $testSuite,
        PackageDefinitionInterface $package,
        BenchmarkResult $benchmarkResult,
    ): void {
        $testSuiteNumber = $testSuite->getNumber();
        $packageName = $package->getDisplayName();

        Color::print("Running test $testSuiteNumber: $packageName", [
            Color::BLUE,
        ]);

        $this->clearOpcache();

        echo Color::DIM, Color::LIGHT_BLUE_ALT;

        for ($run = 0; $run < 20; $run++) {
            $container = $package->getName();
            $result = $this->getResult($testSuiteNumber, $container);

            $benchmarkResult->addTestResult($testSuite, $package, $result);

            if ($result->isSuccessful() === false) {
                echo Color::RESET;
                Color::print("Test failed: " . $result->message(), [Color::RED]);
                return;
            }
        }
        echo Color::RESET;

        echo " (" . $benchmarkResult->getResult($testSuite, $packageName)->timeConsumptionInMilliSeconds() . " ms)\n";
    }



    private function clearOpcache(): void {
        shell_exec("curl -s \"http://caddy/public/index.php?clear=1\"");
    }



    private function getResult(int $suite, string $package_name): Result {
        $pn = urlencode($package_name);
        echo '-';
        $url = "http://caddy/public/index.php?package=$pn&suite=$suite";
        $response = shell_exec("curl -s \"$url\"");
        return empty($response)
            ? Result::unsuccessful("Empty response from server running test $package_name on test suite $suite")
            : Result::fromJSON($response);
    }



}