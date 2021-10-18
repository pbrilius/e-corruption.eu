<?php

namespace Pbrilius\C2cMvcPbgroupeu\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Doctrine\ORM\EntityManager;

abstract class AbstractRestfulController implements CRUDControllerInterface
{
  /**
     * @var \Doctrine\ORM\EntityManager
   */
  private $emn;

  public function __construct(EntityManager $emn)
  {
    $this->emn = $emn;
  }

  public function get(ServerRequestInterface $request): ResponseInterface
  {
  }

  public function getList(ServerRequestInterface $request): ResponseInterface
  {

  }

  public function update(ServerRequestInterface $request): ResponseInterface
  {

  }

  public function patch(ServerRequestInterface $request): ResponseInterface
  {

  }

  public function delete(ServerRequestInterface $request): ResponseInterface
  {

  }

  public function create(ServerRequestInterface $request): ResponseInterface
  {

  }

    /**
     * Get the value of Emn
     *
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEmn()
    {
        return $this->emn;
    }

}
