<?php declare(strict_types=1);

namespace Pbrilius\C2cMvcPbgroupeu\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface CRUDControllerInterface
{
  public function get(ServerRequestInterface $request): ResponseInterface;

  public function getList(ServerRequestInterface $request): ResponseInterface;

  public function update(ServerRequestInterface $request): ResponseInterface;

  public function patch(ServerRequestInterface $request): ResponseInterface;

  public function delete(ServerRequestInterface $request): ResponseInterface;

  public function create(ServerRequestInterface $request): ResponseInterface;

}
