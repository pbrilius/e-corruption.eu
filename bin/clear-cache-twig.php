<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/container.php';

$climate = new League\CLImate\CLImate;

$climate->out('CLI interface clearing Twig cache - wherever it\'s defined.');

$console = $container->get('console.cli')[0];

use Pbrilius\C2cMvcPbgroupeu\Command\ClearTwigCache;
$console->handle(new ClearTwigCache($eniac->get('twig.cache')[0]));
