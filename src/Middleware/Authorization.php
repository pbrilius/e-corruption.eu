<?php

namespace Pbrilius\C2cMvcPbgroupeu\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Diactoros\Response\RedirectResponse;

use Doctrine\ORM\EntityManagerInterface;

// Session management
use pbgroupeu\gettingnote_eu\Controller\Krugman\SessionTrait;

class Authorization implements MiddlewareInterface
{
  use SessionTrait;

  /**
       * Entity manager
       *
       * @var \Doctrine\ORM\EntityManagerInterface
   */
  private $emn;

  public function __construct(EntityManagerInterface $emn, \Session $session)
  {
      $this->setEmn($emn);
      $this->setSession($session);
  }

  /**
   * {@inheritdoc}
   *
   * @todo RBAC implementation
   */
  public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
  {
      $roles = $this->getSession()->getOrDefault('roles', []);

      if (!$roles) {
        throw new \Exception('Unauthorized regime!');
      }

      return $handler->handle($request);
  }

    /**
     * Get the value of Entity manager
     *
     * @return \Doctrine\ORM\EntityManagerInterface
     */
    public function getEmn()
    {
        return $this->emn;
    }

    /**
     * Set the value of Entity manager
     *
     * @param \Doctrine\ORM\EntityManagerInterface $emn
     *
     * @return self
     */
    public function setEmn(\Doctrine\ORM\EntityManagerInterface $emn)
    {
        $this->emn = $emn;

        return $this;
    }

}
