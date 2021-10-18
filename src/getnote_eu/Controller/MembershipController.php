<?php

namespace pbgroupeu\getnote_eu\Controller;

use pbgroupeu\stacer_eu\Controller\GenericAbstractController;
use pbgroupeu\gettingnote_eu\Controller\Krugman\SessionTrait;
use pbgroupeu\gettingnote_eu\Controller\Krugman\EmergencyAccess;

use Doctrine\ORM\EntityManagerInterface;
use pbgroupeu\stacer_eu\Entity\User;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class MembershipController extends GenericAbstractController
{
  use SessionTrait;
  use EmergencyAccess;

  public function __construct(EntityManagerInterface $emn, \Session $session, \PDO $pdo)
  {
    parent::__construct($emn);
    $this->session = $session;
    $this->pdo = $pdo;
  }

  public function membershipStatus(ServerRequestInterface $request): ResponseInterface
  {
    $session = $this->session;

    $sql = 'SELECT u.id, u.email, p.id, p.transaction, t.total, t.membership, m.type'
      . ' FROM user AS u'
      . ' INNER JOIN payer AS p'
      . ' INNER JOIN transaction AS t'
      . ' INNER JOIN membership AS m'
      . ' WHERE u.email = "' . $session->getOrDefault('email', 'guest') . '"'
      . ' LIMIT 1'
      ;

    $pdo = $this->pdo;

    $sth = $pdo->query($sql, \PDO::FETCH_ASSOC);
    $rows = $sth->fetchAll();

    return new JsonResponse($rows);
  }
}
