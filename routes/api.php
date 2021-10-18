<?php

use Psr\Http\Message\ServerRequestInterface;
use pbgroupeu\stacer_eu\Controller\Administration\ETLBasicsController;
use pbgroupeu\stacer_eu\Controller\User\ETLBasicsController as UserETLBasicsController;
use pbgroupeu\gettingnote_eu\Controller\User\ETLBasicsController as ExtendedUserETLBasicsController;

$responseFactory = new Laminas\Diactoros\ResponseFactory();
$strategy = new League\Route\Strategy\JsonStrategy($responseFactory);

// map a route
$router->group('/index.php/api/v' . $eniac->get('api.version'), function ($router) use ($container, $eniac) {
  $router->map('GET', '/', function (ServerRequestInterface $request): array {
    return [
      'title'   => 'API interpolation - interrogation measures against',
      'version' => $eniac->get('api.version'),
    ];
  });
  // Administration scope
  $router->get('/etl-basics/total-users', [$container->get(ETLBasicsController::class), 'getTotalUsers']);
  $router->get('/etl-basics/total-audits', [$container->get(ETLBasicsController::class), 'getTotalAuditBots']);
  $router->get('/etl-basics/total-payments', [$container->get(ETLBasicsController::class), 'getTotalPayments']);
  $router->get('/etl-basics/total-loans', [$container->get(ETLBasicsController::class), 'getTotalLoans']);

  // User scope
  $router->get('/etl-basics/total-user-payments', [$container->get(UserETLBasicsController::class), 'getTotalPayments']);
  $router->get('/etl-basics/total-user-notes', [$container->get(ExtendedUserETLBasicsController::class), 'getTotalNotes']);

  // CRUD REST JSON
  include_once __DIR__ . '/API/note.php';
  include_once __DIR__ . '/API/membership-status.php';

})->setStrategy($strategy)
  ->middleware($container->get('authorization')[0])
  ->middleware($container->get('authentication')[0]);
