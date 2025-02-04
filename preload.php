<?php

opcache_compile_file(__DIR__ . "/core/Benchmark/Benchmark.php");
opcache_compile_file(__DIR__ . "/core/Benchmark/BenchmarkResult.php");
opcache_compile_file(__DIR__ . "/core/Benchmark/ReadmeGenerator.php");

opcache_compile_file(__DIR__ . "/core/Setup/PackageDefinitionInterface.php");
opcache_compile_file(__DIR__ . "/core/Setup/TestRunner.php");
opcache_compile_file(__DIR__ . "/core/Setup/TestCase.php");
opcache_compile_file(__DIR__ . "/core/Setup/TestResult.php");
opcache_compile_file(__DIR__ . "/core/Setup/TestSuiteInterface.php");

opcache_compile_file(__DIR__ . "/core/Utilities/Color.php");
opcache_compile_file(__DIR__ . "/core/Utilities/FileSaver.php");
opcache_compile_file(__DIR__ . "/core/benchmark.php");

opcache_compile_file(__DIR__ . "/src/Generators/ClassTest.php");
opcache_compile_file(__DIR__ . "/src/Generators/ClosureTest.php");
opcache_compile_file(__DIR__ . "/src/Generators/TestClassSimple.php");
opcache_compile_file(__DIR__ . "/src/Generators/TestGenerator.php");
opcache_compile_file(__DIR__ . "/src/Generators/TestRouteBuilder.php");

opcache_compile_file(__DIR__ . "/src/Routers/RouterAdapterInterface.php");

opcache_compile_file(__DIR__ . "/src/TestSuites/TestSuite1.php");
opcache_compile_file(__DIR__ . "/src/TestSuites/TestSuite2.php");
opcache_compile_file(__DIR__ . "/src/TestSuites/TestSuite3.php");
opcache_compile_file(__DIR__ . "/src/TestSuites/TestSuite4.php");
opcache_compile_file(__DIR__ . "/src/TestSuites/TestSuite5.php");
opcache_compile_file(__DIR__ . "/src/TestSuites/TestSuite6.php");
opcache_compile_file(__DIR__ . "/src/TestSuites/TestSuite7.php");
opcache_compile_file(__DIR__ . "/src/TestSuites/TestSuite8.php");
opcache_compile_file(__DIR__ . "/src/TestSuites/TestSuite9.php");

opcache_compile_file(__DIR__ . "/src/Packages.php");
opcache_compile_file(__DIR__ . "/src/TestSuites.php");
