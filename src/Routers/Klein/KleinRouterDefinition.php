<?php

namespace Benchmark\Routers\Klein;

use Benchmark\Routers\AdapterInterface;
use Core\Setup\PackageDefinitionInterface;

class KleinRouterDefinition implements PackageDefinitionInterface {

    public function getPackageName(): string {
        return 'klein/klein';
    }



    public function getName(): string {
        return 'Klein';
    }



    public function getDisplayName(): string {
        return 'Klein';
    }



    public function getUrl(): string {
        return 'https://github.com/klein/klein';
    }



    public function getAdapter(): AdapterInterface {
        return new KleinRouterAdapter();
    }


}