<?php

declare(strict_types=1);

$container = new League\Container\Container();

$container->delegate(
    new League\Container\ReflectionContainer()
);

require_once __DIR__ . '/../bootstrap.php';

// Doctrine ORM
use Doctrine\ORM\EntityManagerInterface;

$container->add(EntityManagerInterface::class, $entityManager)->addTag('doctrine.orm');

// Logging
include_once __DIR__ . '/../monolog.php';
use Monolog\Logger;
$container->add(Logger::class, $logger)->addTag('logger');

// Frontend templates
use Twig\Environment;
include_once __DIR__ . '/../twig.php';
$container->add(Environment::class, $twig)->addTag('twig');

// Commands & handlers
use Pbrilius\C2cMvcPbgroupeu\Handler\ClearTwigCacheHandler;
$container->add(ClearTwigCacheHandler::class, function() use ($eniac) {
  return new ClearTwigCacheHandler($eniac->get('twig.cache'));
});
require_once __DIR__ . '/../commands.php';
use League\Tactician\CommandBus;

$container->add(CommandBus::class, $commandBus)->addTag('console.cli')->setShared();

// Session handling operations
require_once __DIR__ . '/../session.php';
$container->add(Session::class, $session)->addTag('session')->setShared();

// Middleware section
use Pbrilius\C2cMvcPbgroupeu\Middleware\Authentication;
use Pbrilius\C2cMvcPbgroupeu\Middleware\Authorization;

$container->add(Authorization::class, function() use ($container) {
  $authorization = new Authorization(
    $container->get('doctrine.orm')[0],
    $container->get('session')[0]
  );

  return $authorization;
})->addTag('authorization')->setShared();

$container->add(Authentication::class, function() use ($container) {
  $authentication = new  Authentication(
    $container->get('doctrine.orm')[0],
    $container->get('session')[0]
  );

  return $authentication;
})->addTag('authentication')->setShared();

use pbgroupeu\gettingnote_eu\Middleware\Analytics;
$container->add(Analytics::class, function() use ($container, $eniac) {
  $analytics = new Analytics(
    $container->get('doctrine.orm')[0],
    $container->get('session')[0],
    $container->get('elk.client')[0],
    $eniac->get('analytics.index')
  );

  return $analytics;
})->addTag('analytics')->setShared();

// REST CRUD - JSON
use pbgroupeu\gettingnote_eu\Controller\API\NoteController;
$container->add(NoteController::class, function() use ($container) {
  return new NoteController(
    $container->get('doctrine.orm')[0],
    $container->get('session')[0],
  );
});

// ELK
$client = Elasticsearch\ClientBuilder::create()
  ->setBasicAuthentication($eniac->get('analytics.username'), $eniac->get('analytics.password'))
  ->build();
$container->add(Elasticsearch\Client::class, $client)->addTag('elk.client');

// PDO - database
$pdo = include __DIR__ . '/../emergency/pdo-database.php';
$container->add(\PDO::class, $pdo)->setShared()->addTag('pdo.emergency');
