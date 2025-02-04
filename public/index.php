<?php

declare(strict_types=1);

require __DIR__ . "/../vendor/autoload.php";

const PROJECT_ROOT = __DIR__ . '/../';

use Core\Setup\Result;
use Core\Setup\TestRunner;

if (isset($_GET['dev'])) {
    opcache_reset();
    $_GET['package'] = 'Sharkk';
    $_GET['suite'] = 8;
}

if (isset($_GET["clear"])) {
    opcache_reset();
    exit;
}

function dd($data): never {
    echo '<pre>';
    print_r($data);
    die;
}

$package = $_GET['package'] ?? null;
$suite = $_GET['suite'] ?? null;

if ($package === null) {
    Result::unsuccessful('Missing package parameter')->printJsonResult();
}
if ($suite === null) {
    Result::unsuccessful('Missing suite parameter')->printJsonResult();
}

try {
    new TestRunner()->run($package, (int)$suite)->printJsonResult();
} catch (\Throwable $exception) {
    Result::unsuccessful($exception->getMessage())->printJsonResult();
}

