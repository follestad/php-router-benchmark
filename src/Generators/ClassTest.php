<?php

namespace Benchmark\Generators;

readonly class ClassTest {

    public function __construct(
        public string $path,
        public string $result,
        public string $registerPath,
        public string $class,
        public string $method,
    ) {}


}