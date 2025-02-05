<?php

namespace Benchmark\Routers\Jaunt;

use Benchmark\Routers\AdapterInterface;
use Core\Setup\PackageDefinitionInterface;

class JauntRouterDefinition implements PackageDefinitionInterface {

    public function getPackageName(): string {
        return 'davenusbaum/jaunt';
    }



    public function getName(): string {
        return 'Jaunt';
    }



    public function getDisplayName(): string {
        return 'Jaunt';
    }



    public function getUrl(): string {
        return 'https://github.com/davenusbaum/jaunt';
    }



    public function getAdapter(): AdapterInterface {
        return new JauntRouterAdapter();
    }


}