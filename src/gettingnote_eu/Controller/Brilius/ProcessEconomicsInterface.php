<?php

namespace pbgroupeu\gettingnote_eu\Controller\Brilius;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface ProcessEconomicsInterface
{
  /**
     * Home frontend spot
     *
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
   */
  public function home(ServerRequestInterface $request): ResponseInterface;

  /**
     * Guest frontend spot
     *
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
   */
  public function guest(ServerRequestInterface $request): ResponseInterface;
}
