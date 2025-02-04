<?php

namespace Benchmark\Routers\Nette;

use Benchmark\Routers\AdapterInterface;
use Core\Setup\PackageDefinitionInterface;

class NetteRouterDefinition implements PackageDefinitionInterface {

    public function getPackageName(): string {
        return 'nette/routing';
    }



    public function getName(): string {
        return 'Nette';
    }



    public function getDisplayName(): string {
        return 'Nette';
    }



    public function getUrl(): string {
        return 'https://github.com/nette/routing';
    }



    public function getAdapter(): AdapterInterface {
        return new NetteRouterAdapter();
    }


}