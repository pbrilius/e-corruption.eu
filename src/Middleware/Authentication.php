<?php

namespace Pbrilius\C2cMvcPbgroupeu\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Diactoros\Response\RedirectResponse;

use Doctrine\ORM\EntityManagerInterface;

class Authentication implements MiddlewareInterface
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

    public function __construct(EntityManagerInterface $emn, \Session $session)
    {
        $this->emn = $emn;
        $this->session = $session;
    }

    /**
     * {@inheritdoc}
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $session = $this->session;
        if ($session->getOrDefault('authenticated', false) === true) {
            return $handler->handle($request);
        }

        return new RedirectResponse('/index.php/krugman/login');
    }
}
