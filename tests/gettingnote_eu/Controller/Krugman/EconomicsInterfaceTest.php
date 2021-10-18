<?php

declare(strict_types=1);

namespace pbgroupeu\tests\gettingnote_eu\Controller\Krugman;

use pbgroupeu\gettingnote_eu\Controller\Krugman\EconomicsInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class EconomicsInterfaceTest extends \PHPUnit\Framework\TestCase
{
  /**
     * @covers EconomicsInterface
   */
  public function testImplementation(): void
  {
    $mock = $this->createMock(EconomicsInterface::class);

    $mock
      ->expects($this->any())
      ->method('login')
      ->with($this->createMock(ServerRequestInterface::class))
      ->willReturn($this->createStub(ResponseInterface::class));

    $mock
      ->expects($this->any())
      ->method('logout')
      ->with($this->createMock(ServerRequestInterface::class))
      ->willReturn($this->createStub(ResponseInterface::class));

    $mock
      ->expects($this->any())
      ->method('register')
      ->with($this->createMock(ServerRequestInterface::class))
      ->willReturn($this->createStub(ResponseInterface::class));

    $mock
      ->expects($this->any())
      ->method('processLogin')
      ->with($this->createMock(ServerRequestInterface::class))
      ->willReturn($this->createStub(ResponseInterface::class));

    $mock
      ->expects($this->any())
      ->method('processRegister')
      ->with($this->createMock(ServerRequestInterface::class))
      ->willReturn($this->createStub(ResponseInterface::class));

    $response = $mock->login($this->createStub(ServerRequestInterface::class));
    $this->assertInstanceOf(ResponseInterface::class, $response);

    $mock->logout($this->createStub(ServerRequestInterface::class));
    $this->assertInstanceOf(ResponseInterface::class, $response);

    $mock->register($this->createStub(ServerRequestInterface::class));
    $this->assertInstanceOf(ResponseInterface::class, $response);

    $mock->processLogin($this->createStub(ServerRequestInterface::class));
    $this->assertInstanceOf(ResponseInterface::class, $response);

    $mock->processRegister($this->createStub(ServerRequestInterface::class));
    $this->assertInstanceOf(ResponseInterface::class, $response);
  }
}
