<?php

namespace Benchmark\Routers\GLRoute;

use Benchmark\Routers\AdapterInterface;
use Core\Setup\PackageDefinitionInterface;

class GLRouteRouterDefinition implements PackageDefinitionInterface {

    public function getPackageName(): string {
        return 'geeklab/glroute';
    }



    public function getName(): string {
        return 'GLRoute';
    }



    public function getDisplayName(): string {
        return 'GLRoute';
    }



    public function getUrl(): string {
        return 'https://github.com/ellisgl/GLRoute';
    }



    public function getAdapter(): AdapterInterface {
        return new GLRouteRouterAdapter();
    }


}