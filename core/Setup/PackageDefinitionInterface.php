<?php

namespace Core\Setup;

use Benchmark\Routers\AdapterInterface;

interface PackageDefinitionInterface {

    public function getPackageName(): string;



    public function getName(): string;



    public function getDisplayName(): string;



    public function getUrl(): string;



    public function getAdapter(): AdapterInterface;


}