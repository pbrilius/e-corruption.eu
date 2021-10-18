<?php

namespace pbgroupeu\stacer_eu\Controller\User;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;
use pbgroupeu\stacer_eu\Entity\Payment;

use pbgroupeu\stacer_eu\Controller\GenericAbstractController;

class ETLBasicsController extends GenericAbstractController
{
  /**
     * Total payments
     *
     * @var ServerRequestInterface $request
     *
     * @return ResponseInterface
   */
  public function getTotalPayments(ServerRequestInterface $request): ResponseInterface
  {
    $emn = $this->getEmn();

    $totalPayments = $emn->getRepository(Payment::class)->getTotalUserPayments($request->getQuery('user_id'));
    $response = new Response();
    $response->getBody()->write(json_encode($totalPayments));

    return $response;
  }
}
