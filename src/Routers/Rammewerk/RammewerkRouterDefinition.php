<?php

namespace Benchmark\Routers\Rammewerk;

use Benchmark\Routers\AdapterInterface;
use Core\Setup\PackageDefinitionInterface;

class RammewerkRouterDefinition implements PackageDefinitionInterface {

    public function getPackageName(): string {
        return 'rammewerk/router';
    }



    public function getName(): string {
        return 'Rammewerk';
    }



    public function getDisplayName(): string {
        return 'Rammewerk Router';
    }



    public function getUrl(): string {
        return 'https://github.com/rammewerk/router';
    }



    public function getAdapter(): AdapterInterface {
        return new RammewerkRouterAdapter();
    }


}