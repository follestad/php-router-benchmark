<?php
declare(strict_types=1);

namespace Benchmark;


use Benchmark\Routers\AltoRouter\AltoRouterDefinition;
use Benchmark\Routers\Bramus\BramusRouterDefinition;
use Benchmark\Routers\FastRoute\FastRouteRouteDefinition;
use Benchmark\Routers\Klein\KleinRouterDefinition;
use Benchmark\Routers\Laravel\LaravelRouteDefinition;
use Benchmark\Routers\Nette\NetteRouterDefinition;
use Benchmark\Routers\PHRoute\PHRouteRouteDefinition;
use Benchmark\Routers\Rammewerk\RammewerkRouterDefinition;
use Benchmark\Routers\Sharkk\SharkkRouterDefinition;
use Benchmark\Routers\Symfony\SymfonyRouterDefinition;
use Core\Setup\PackageDefinitionInterface;
use Benchmark\Routers\Jaunt\JauntRouterDefinition;


final class Packages {

    public function getAllDefinitions(): array {
        return [
            new LaravelRouteDefinition(),
            new RammewerkRouterDefinition(),
            new BramusRouterDefinition(),
            new AltoRouterDefinition(),
            new SymfonyRouterDefinition(),
            new KleinRouterDefinition(),
            new FastRouteRouteDefinition(),
            new PHRouteRouteDefinition(),
            new NetteRouterDefinition(),
            new SharkkRouterDefinition(),
            new JauntRouterDefinition()
        ];
    }



    public function getDefinition(string $name): ?PackageDefinitionInterface {
        return array_find(
            $this->getAllDefinitions(),
            static fn($definition) => $definition->getName() === $name,
        );
    }


}