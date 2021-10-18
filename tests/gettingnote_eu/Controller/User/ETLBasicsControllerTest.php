<?php

declare(strict_types=1);

namespace pbgroupeu\tests\gettingnote_eu\Controller\User;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

use pbgroupeu\gettingnote_eu\Controller\User\ETLBasicsController;

class ETLBasicsControllerTest extends \PHPUnit\Framework\TestCase
{
  /**
     * @covers ETLBasicsController
   */
  public function testOOP(): void
  {
    $controller = $this
      ->getMockBuilder(ETLBasicsController::class)
      ->disableOriginalConstructor()
      ->getMock();

    $this->assertIsObject($controller);
  }

  /**
     * @covers ETLBasicsController
   */
  public function testWillReturnResponse()
  {
    $controller = $this
      ->getMockBuilder(ETLBasicsController::class)
      ->disableOriginalConstructor()
      ->getMock();

    $controller
      ->expects($this->once())
      ->method('getTotalNotes')
      ->with($this->createMock(ServerRequestInterface::class))
      ->willReturn($this->createMock(ResponseInterface::class));

    $controller->getTotalNotes($this->createStub(ServerRequestInterface::class));
  }
}
