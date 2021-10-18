<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use pbgroupeu\stacer_eu\Controller\Administration\Frontend\DashboardBasics;
use pbgroupeu\stacer_eu\Controller\User\Frontend\DashboardBasics as UserDashboardBasics;

// Entity - enterprise management & economics
use pbgroupeu\gettingnote_eu\Controller\Krugman\Economics;
use pbgroupeu\gettingnote_eu\Controller\Brilius\ProcessEconomics;

$router->map('GET', '/index.php', function (ServerRequestInterface $request) use ($container, $eniac): ResponseInterface {

    $twig = $container->get('twig')[0];

    $template = $twig->load('@user/index.html.twig');

    $response = new Laminas\Diactoros\Response;
    $response->getBody()->write($template->render([
      'target' => 'User',
    ]));
    return $response;
});

$router->map('GET', '/index.php/admin', function (ServerRequestInterface $request) use ($container, $eniac): ResponseInterface {

    $twig = $container->get('twig')[0];

    $template = $twig->load('@admin/index.html.twig');

    $response = new Laminas\Diactoros\Response;
    $response->getBody()->write($template->render([
      'target' => 'Administrator',
    ]));
    return $response;
});

// Administration scope
$router->group('/index.php/admin', function (\League\Route\RouteGroup $route) use ($container) {
    $route->map('GET', '/dashboard/basics-ETL', [$container->get(DashboardBasics::class), 'basicEtlDashboard']);
})->middleware($container->get('analytics')[0]);

// User scope
$router->group('/index.php/user', function (\League\Route\RouteGroup $route) use ($container) {
    $route->map('GET', '/dashboard/basics-ETL', [$container->get(UserDashboardBasics::class), 'basicEtlDashboard']);
})->middleware($container->get('analytics')[0]);

// Krugman Economics scale
$router->group('/index.php/security', function (\League\Route\RouteGroup $route) use ($container) {
    $route->map('GET', '/login', [$container->get(Economics::class), 'login']);
    $route->map('GET', '/logout', [$container->get(Economics::class), 'logout']);
    $route->map('GET', '/register', [$container->get(Economics::class), 'register']);
    $route->map('POST', '/process-login', [$container->get(Economics::class), 'processLogin']);
    $route->map('POST', '/process-register', [$container->get(Economics::class), 'processRegister']);
});

$router->group('/index.php/redirected', function (\League\Route\RouteGroup $route) use ($container) {
  $route->map('GET', '/home', [$container->get(ProcessEconomics::class), 'home']);
  $route->map('GET', '/guest', [$container->get(ProcessEconomics::class), 'guest']);
});
