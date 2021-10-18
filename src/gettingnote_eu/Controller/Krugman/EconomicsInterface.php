<?php

namespace pbgroupeu\gettingnote_eu\Controller\Krugman;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface EconomicsInterface
{
  public function login(ServerRequestInterface $request): ResponseInterface;

  public function logout(ServerRequestInterface $request): ResponseInterface;

  public function register(ServerRequestInterface $request): ResponseInterface;

  public function processLogin(ServerRequestInterface $request): ResponseInterface;

  public function processRegister(ServerRequestInterface $request): ResponseInterface;
}
