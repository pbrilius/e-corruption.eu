<?php

namespace pbgroupeu\stacer_eu\Controller\Administration;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;
use pbgroupeu\stacer_eu\Entity\User;
use pbgroupeu\stacer_eu\Entity\Payment;
use pbgroupeu\stacer_eu\Entity\Audit;
use pbgroupeu\stacer_eu\Entity\Loan;

use pbgroupeu\stacer_eu\Controller\GenericAbstractController;

class ETLBasicsController extends GenericAbstractController
{
  /**
     * Total users
     *
     * @var ServerRequestInterface $request
     *
     * @return ResponseInterface
   */
  public function getTotalUsers(ServerRequestInterface $request): ResponseInterface
  {
    $emn = $this->getEmn();

    $totalUsers = $emn->getRepository(User::class)->getTotalUsers();
    $response = new Response();
    $response->getBody()->write(json_encode($totalUsers));

    return $response;
  }

  /**
     * Total audits
     *
     * @var ServerRequestInterface $request
     *
     * @return ResponseInterface
   */
  public function getTotalAuditBots(ServerRequestInterface $request): ResponseInterface
  {
    $emn = $this->getEmn();

    $totalAudits = $emn->getRepository(Audit::class)->getTotalAuditBots();

    $response = new Response();
    $response->getBody()->write(json_encode($totalAudits));

    return $response;
  }

  /**
     * Total Loans
     *
     * @var ServerRequestInterface $request
     *
     * @return ResponseInterface
   */
  public function getTotalLoans(ServerRequestInterface $request): ResponseInterface
  {
    $emn = $this->getEmn();

    $totalLoans = $emn->getRepository(Loan::class)->getTotalLoans();

    $response = new Response();
    $response->getBody()->write(json_encode($totalLoans));

    return $response;
  }

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

    $totalPayments = $emn->getRepository(Payment::class)->getTotalPayments();

    $response = new Response();
    $response->getBody()->write(json_encode($totalPayments));

    return $response;
  }
}
