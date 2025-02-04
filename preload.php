<?php
opcache_compile_file(__DIR__ . "/core/Setup/PackageDefinitionInterface.php");
opcache_compile_file(__DIR__ . "/core/Setup/TestRunner.php");
opcache_compile_file(__DIR__ . "/core/Setup/TestCase.php");
opcache_compile_file(__DIR__ . "/core/Setup/TestResult.php");
opcache_compile_file(__DIR__ . "/core/Setup/TestSuiteInterface.php");

opcache_compile_file(__DIR__ . "/src/Routers/RouterAdapterInterface.php");
opcache_compile_file(__DIR__ . "/src/Packages.php");
opcache_compile_file(__DIR__ . "/src/TestSuites.php");
