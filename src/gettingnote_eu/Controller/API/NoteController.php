<?php

namespace pbgroupeu\gettingnote_eu\Controller\API;

use Pbrilius\C2cMvcPbgroupeu\Controller\AbstractRestfulController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

// Entity - enterprise - management
use pbgroupeu\stacer_eu\Entity\Note;
use pbgroupeu\stacer_eu\Entity\User;
use pbgroupeu\gettingnote_eu\Controller\TQM\TQMTrait;
use pbgroupeu\gettingnote_eu\Controller\TQM\TQMInterface;
use pbgroupeu\gettingnote_eu\Controller\Brilius\SMEEconomicsTrait;
use pbgroupeu\gettingnote_eu\Controller\Brilius\SMEEconomicsInterface;
use pbgroupeu\gettingnote_eu\Controller\Krugman\SessionTrait;
use Doctrine\ORM\EntityManager;

class NoteController extends AbstractRestfulController implements TQMInterface, SMEEconomicsInterface
{
  use TQMTrait;
  use SMEEconomicsTrait;
  use SessionTrait;

  /**
     * @inheritdoc
   */
  public function __construct(EntityManager $emn, \Session $session)
  {
    parent::__construct($emn);
    $this->setSession($session);
  }

  /**
     * @inheritdoc
   */
  public function boot(): void
  {
    $this->allowedRoles = ['user', 'administrator'];
    $this->allowedAttributes = ['administration', 'self'];
  }

  public function get(ServerRequestInterface $request): ResponseInterface
  {
    $this->checkAccessForRoles($this->getSession()->getOrDefault('roles', []));

    $emn = $this->getEmn();
    $note = $emn->find(Note::class, $request->getQueryParams()['id']);

    if (!$note) {
      throw new \Exception('Target not found!');
    }

    $this->checkAgainstAttributes($note->getAttributes(),
      $emn->getRepository(User::class, [
        'email' => $this->getSession()->getOrDefault('email'),
      ]),
      $note->getUser()
    );

    $response = new Response();
    $response->getBody()->write(json_encode($note->jsonSerialize()));

    return $response;
  }

  public function getList(ServerRequestInterface $request): ResponseInterface
  {
    $this->checkAccessForRoles($this->getSession()->getOrDefault('roles', []));

    $emn = $this->getEmn();
    $notes = $emn->getRepository(Note::class)->findAll();

    if (!$notes) {
      throw new \Exception('Target not found!');
    }

    $serializedEntities = [];
    /**
         * @var Note $note
     */
    foreach ($notes as $note) {
      $this->checkAgainstAttributes($note->getAttributes(),
        $emn->getRepository(User::class, [
          'email' => $this->getSession()->getOrDefault('email'),
        ]),
        $note->getUser()
      );
      $serializedEntities []= $note->jsonSerializs();
    }

    $response = new Response();
    $response->getBody()->write(json_encode($serializedEntities));

    return $response;
  }

  public function update(ServerRequestInterface $request): ResponseInterface
  {
    $this->checkAccessForRoles($this->getSession()->getOrDefault('roles', []));

    $emn = $this->getEmn();
    /**
         * @var Note $note
     */
    $note = $emn->find(Note::class, $request->getQueryParams()['id']);

    if (!$note) {
      throw new \Exception('Target not found!');
    }

    $this->checkAgainstAttributes($note->getAttributes(),
      $emn->getRepository(User::class, [
        'email' => $this->getSession()->getOrDefault('email'),
      ]),
      $note->getUser()
    );

    $note->setNote($request->getParsedBody()['note']);
    $emn->persist($note);
    $emn->flush();

    $response = new Response();
    $response->getBody()->write(json_encode($note->jsonSerialize()));

    return $response;
  }

  public function patch(ServerRequestInterface $request): ResponseInterface
  {
    $this->checkAccessForRoles($this->getSession()->getOrDefault('roles', []));

    $emn = $this->getEmn();
    /**
         * @var Note $note
     */
    $note = $emn->find(Note::class, $request->getQueryParams()['id']);

    if (!$note) {
      throw new \Exception('Target not found!');
    }

    $this->checkAgainstAttributes($note->getAttributes(),
      $emn->getRepository(User::class, [
        'email' => $this->getSession()->getOrDefault('email'),
      ]),
      $note->getUser()
    );

    $note->setNote($request->getParsedBody()['note']);
    $emn->persist($note);
    $emn->flush();

    $response = new Response();
    $response->getBody()->write(json_encode($note->jsonSerialize()));

    return $response;
  }

  public function delete(ServerRequestInterface $request): ResponseInterface
  {
    $this->checkAccessForRoles($this->getSession()->getOrDefault('roles', []));

    $emn = $this->getEmn();
    /**
         * @var Note $note
     */
    $note = $emn->find(Note::class, $request->getQueryParams()['id']);

    if (!$note) {
      throw new \Exception('Target not found!');
    }

    $this->checkAgainstAttributes($note->getAttributes(),
      $emn->getRepository(User::class, [
        'email' => $this->getSession()->getOrDefault('email'),
      ]),
      $note->getUser()
    );

    $emn->remove($note);
    $emn->flush();

    $response = new Response();

    return $response;
  }

  public function create(ServerRequestInterface $request): ResponseInterface
  {
    $this->checkAccessForRoles($this->getSession()->getOrDefault('roles', []));

    $emn = $this->getEmn();

    $note = new Note();

    $user = $emn->getRepository(User::class, [
      'email' => $this->getSession()->getOrDefault('email'),
    ]);

    $note->setNote($request->getParsedBody()['note']);
    $note->setGeotags($request->getParsedBody()['geotags']);
    $note->setUser($user);

    $emn->persist($note);
    $emn->flush();

    $response = new Response();
    $response->getBody()->write(json_encode($note->jsonSerialize()));

    return $response;
  }
}
