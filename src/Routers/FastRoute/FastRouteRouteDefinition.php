<?php

namespace Benchmark\Routers\FastRoute;

use Benchmark\Routers\AdapterInterface;
use Core\Setup\PackageDefinitionInterface;

class FastRouteRouteDefinition implements PackageDefinitionInterface {

    public function getPackageName(): string {
        return 'nikic/fast-route';
    }



    public function getName(): string {
        return 'FastRoute';
    }



    public function getDisplayName(): string {
        return 'FastRoute';
    }



    public function getUrl(): string {
        return 'https://github.com/nikic/FastRoute';
    }



    public function getAdapter(): AdapterInterface {
        return new FastRouteRouteAdapter();
    }


}