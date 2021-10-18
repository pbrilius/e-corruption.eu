<?php

namespace pbgroupeu\gettingnote_eu\Controller\User;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;
use pbgroupeu\gettingnote_eu\Entity\Note;
use pbgroupeu\stacer_eu\Entity\User;

use pbgroupeu\stacer_eu\Controller\User\ETLBasicsController as BaseETLController;

// Session
use pbgroupeu\gettingnote_eu\Controller\Krugman\SessionTrait;

// SME Economics
use pbgroupeu\gettingnote_eu\Controller\Brilius\SMEEconomicsTrait;
use pbgroupeu\gettingnote_eu\Controller\Brilius\SMEEconomicsInterface;

// Constructor
use Doctrine\ORM\EntityManagerInterface;

class ETLBasicsController extends BaseETLController implements SMEEconomicsInterface
{
  use SessionTrait;
  use SMEEconomicsTrait;

  /**
     * @param EntityManagerInterface $emn
   */
  public function __construct(EntityManagerInterface $emn, \Session $session)
  {
    parent::__construct($emn);
    $this->session = $session;

    $this->boot();
  }

  public function boot(): void
  {
    $this->allowedRoles = [
      'user',
    ];
  }

  /**
     * Total notes
     *
     * @var ServerRequestInterface $request
     *
     * @return ResponseInterface
   */
  public function getTotalNotes(ServerRequestInterface $request): ResponseInterface
  {
    $emn = $this->getEmn();
    $session = $this->session;

    $this->checkAccessForRoles($session->getOrDefault('roles', []));

    $user = $emn->getRepository(User::class)->findOneBy([
      'email' => $session->get('email'),
    ]);

    if (!$user) {
      throw new \Exception('User not found');
    }

    $totalNotes = $emn->getRepository(Note::class)->getTotalUserNotes($user);
    $response = new Response();
    $response->getBody()->write(json_encode($totalNotes));

    return $response;
  }

}
