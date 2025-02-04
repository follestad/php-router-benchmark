<?php

namespace Benchmark\Routers\PHRoute;

use Benchmark\Routers\AdapterInterface;
use Core\Setup\PackageDefinitionInterface;

class PHRouteRouteDefinition implements PackageDefinitionInterface {

    public function getPackageName(): string {
        return 'phroute/phroute';
    }



    public function getName(): string {
        return 'PHRoute';
    }



    public function getDisplayName(): string {
        return 'PHRoute';
    }



    public function getUrl(): string {
        return 'https://github.com/mrjgreen/phroute';
    }



    public function getAdapter(): AdapterInterface {
        return new PHRouteRouteAdapter();
    }


}