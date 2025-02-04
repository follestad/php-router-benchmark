<?php

namespace Benchmark\Routers\Sharkk;

use Benchmark\Routers\AdapterInterface;
use Core\Setup\PackageDefinitionInterface;

class SharkkRouterDefinition implements PackageDefinitionInterface {

    public function getPackageName(): string {
        return 'sharkk/router';
    }



    public function getName(): string {
        return 'Sharkk';
    }



    public function getDisplayName(): string {
        return 'Sharkk';
    }



    public function getUrl(): string {
        return 'https://git.sharkk.net/PHP/Router';
    }



    public function getAdapter(): AdapterInterface {
        return new SharkkRouterAdapter();
    }


}