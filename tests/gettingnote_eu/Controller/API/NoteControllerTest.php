<?php

declare(strict_types=1);

namespace pbgroupeu\gettingnote_eu\tests\Controller\API;

use pbgroupeu\gettingnote_eu\Controller\API\NoteController;

use pbgroupeu\gettingnote_eu\Controller\TQM\TQMInterface;
use pbgroupeu\gettingnote_eu\Controller\Brilius\SMEEconomicsInterface;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class NoteControllerTest extends \PHPUnit\Framework\TestCase
{
  /**
     * @covers NoteController
   */
  public function testInterfacesImplementation(): void
  {
    $mock = $this
      ->getMockBuilder(NoteController::class)
      ->disableOriginalConstructor()
      ->getMock();

    $this->assertInstanceOf(TQMInterface::class, $mock);
    $this->assertInstanceOf(SMEEconomicsInterface::class, $mock);
  }

  /**
     * @covers NoteController
   */
  public function testInterfacesDelivery(): void
  {
    $mock = $this
      ->getMockBuilder(NoteController::class)
      ->disableOriginalConstructor()
      ->getMock();

    $mock
      ->expects($this->any())
      ->method('get')
      ->with($this->createStub(ServerRequestInterface::class))
      ->willReturn($this->createStub(ResponseInterface::class));

    $this->assertInstanceOf(ResponseInterface::class, $mock->get($this->createMock(ServerRequestInterface::class)));

    $mock
      ->expects($this->any())
      ->method('getList')
      ->with($this->createStub(ServerRequestInterface::class))
      ->willReturn($this->createStub(ResponseInterface::class));

    $this->assertInstanceOf(ResponseInterface::class, $mock->getList($this->createMock(ServerRequestInterface::class)));

    $mock
      ->expects($this->any())
      ->method('update')
      ->with($this->createStub(ServerRequestInterface::class))
      ->willReturn($this->createStub(ResponseInterface::class));

    $this->assertInstanceOf(ResponseInterface::class, $mock->update($this->createMock(ServerRequestInterface::class)));

    $mock
      ->expects($this->any())
      ->method('patch')
      ->with($this->createStub(ServerRequestInterface::class))
      ->willReturn($this->createStub(ResponseInterface::class));

    $this->assertInstanceOf(ResponseInterface::class, $mock->patch($this->createMock(ServerRequestInterface::class)));

    $mock
      ->expects($this->any())
      ->method('delete')
      ->with($this->createStub(ServerRequestInterface::class))
      ->willReturn($this->createStub(ResponseInterface::class));

    $this->assertInstanceOf(ResponseInterface::class, $mock->delete($this->createMock(ServerRequestInterface::class)));

    $mock
      ->expects($this->any())
      ->method('create')
      ->with($this->createStub(ServerRequestInterface::class))
      ->willReturn($this->createStub(ResponseInterface::class));

    $this->assertInstanceOf(ResponseInterface::class, $mock->create($this->createMock(ServerRequestInterface::class)));
  }
}
