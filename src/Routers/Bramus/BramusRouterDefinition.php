<?php

namespace Benchmark\Routers\Bramus;

use Benchmark\Routers\AdapterInterface;
use Core\Setup\PackageDefinitionInterface;

class BramusRouterDefinition implements PackageDefinitionInterface {

    public function getPackageName(): string {
        return 'bramus/router';
    }



    public function getName(): string {
        return 'Bramus';
    }



    public function getDisplayName(): string {
        return 'Bramus';
    }



    public function getUrl(): string {
        return 'https://github.com/bramus/router';
    }



    public function getAdapter(): AdapterInterface {
        return new BramusRouterAdapter();
    }


}