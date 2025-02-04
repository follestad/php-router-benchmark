<?php

namespace Benchmark\Routers\Symfony;

use Benchmark\Routers\AdapterInterface;
use Core\Setup\PackageDefinitionInterface;

class SymfonyRouterDefinition implements PackageDefinitionInterface {

    public function getPackageName(): string {
        return 'symfony/routing';
    }



    public function getName(): string {
        return 'Symfony';
    }



    public function getDisplayName(): string {
        return 'Symfony Router';
    }



    public function getUrl(): string {
        return 'https://symfony.com/doc/current/routing.html';
    }



    public function getAdapter(): AdapterInterface {
        return new SymfonyRouterAdapter();
    }


}