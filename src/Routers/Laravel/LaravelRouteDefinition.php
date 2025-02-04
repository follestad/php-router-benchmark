<?php

namespace Benchmark\Routers\Laravel;

use Benchmark\Routers\AdapterInterface;
use Core\Setup\PackageDefinitionInterface;

class LaravelRouteDefinition implements PackageDefinitionInterface {

    public function getPackageName(): string {
        return "illuminate/routing";
    }



    public function getName(): string {
        return 'Laravel';
    }



    public function getDisplayName(): string {
        return 'Laravel';
    }



    public function getUrl(): string {
        return 'https://github.com/illuminate/routing';
    }



    public function getAdapter(): AdapterInterface {
        return new LaravelRouteAdapter();
    }


}