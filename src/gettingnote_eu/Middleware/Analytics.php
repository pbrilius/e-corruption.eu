<?php

namespace pbgroupeu\gettingnote_eu\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Diactoros\Response\RedirectResponse;

// Client
use Elasticsearch\Client;

// Doctrine ORM
use Doctrine\ORM\EntityManagerInterface;

// User
use pbgroupeu\stacer_eu\Entity\User;
// Analytics
use pbgroupeu\gettingnote_eu\Entity\Note;

class Analytics implements MiddlewareInterface
{
  /**
   * Entity manager
   *
   * @var \Doctrine\ORM\EntityManagerInterface
   */
  private $emn;

  /**
     * @var \Session $session
   */
  private $session;

  /**
     * @var Client
   */
  private $client;

  /**
     * @var string
   */
  protected $index;

  /**
     * @param EntityManagerInterface $emn
     * @param \Session $session
     * @param Client $client
     * @param string $index
   */
  public function __construct(EntityManagerInterface $emn, \Session $session, Client $client, string $index)
  {
      $this->emn = $emn;
      $this->session = $session;
      $this->client = $client;
      $this->index = $index;
  }

  /**
     * @inheritDoc
   */
  public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
  {
    $dataEntries = [
      'email' => $this->session->getOrDefault('email', 'guest'),
    ];

    $user = $this->emn->getRepository(User::class)->findOneBy([
      'email' => $dataEntries['email'],
    ]);

    if ($user) {
      $totalNotes = $this->emn->getRepository(Note::class)->getTotalUserNotes($user);
      $dataEntries = [
        'total_notes' => $totalNotes,
      ];
    }

    $parameters = [
      'index' => $this->index,
      'id' => uniqid(),
      'body' => $dataEntries,
    ];

    $this->client->index($parameters);

    return $handler->handle($request);
  }
}
