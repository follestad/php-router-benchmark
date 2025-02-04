<?php

namespace Benchmark\Generators;

readonly class ClosureTest {

    public function __construct(
        public string $path,
        public string $result,
        public string $registerPath,
        public \Closure $closure,
    ) {}


}