<?php

namespace Benchmark\Routers\AltoRouter;

use Benchmark\Routers\AdapterInterface;
use Core\Setup\PackageDefinitionInterface;

class AltoRouterDefinition implements PackageDefinitionInterface {

    public function getPackageName(): string {
        return 'altorouter/altorouter';
    }



    public function getName(): string {
        return 'AltoRouter';
    }



    public function getDisplayName(): string {
        return 'AltoRouter';
    }



    public function getUrl(): string {
        return 'https://github.com/dannyvankooten/AltoRouter';
    }



    public function getAdapter(): AdapterInterface {
        return new AltoRouterAdapter();
    }


}