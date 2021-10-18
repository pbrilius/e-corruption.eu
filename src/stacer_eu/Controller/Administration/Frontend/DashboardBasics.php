<?php

namespace pbgroupeu\stacer_eu\Controller\Administration\Frontend;

use pbgroupeu\stacer_eu\Controller\AbstractFrontendController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class DashboardBasics extends AbstractFrontendController
{
  /**
     * Basic ETL counters
     *
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
   */
  public function basicEtlDashboard(ServerRequestInterface $request): ResponseInterface
  {
    $twig = $this->twig;

    $template = $twig->load('@admin/dashboard-basics.html.twig');

    $response = new \Laminas\Diactoros\Response;
    $response->getBody()->write($template->render());

    return $response;
  }
}
