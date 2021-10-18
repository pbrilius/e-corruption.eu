<?php

use Pbrilius\C2cMvcPbgroupeu\Command\ClearTwigCache;
use Pbrilius\C2cMvcPbgroupeu\Handler\ClearTwigCacheHandler;

/**
 * @var \League\Tactician\CommandBus @commandBus
 */
$commandBus = League\Tactician\Setup\QuickStart::create(
    [
        ClearTwigCache::class => $container->get(ClearTwigCacheHandler::class),
    ]
);
