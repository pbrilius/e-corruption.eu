<?php declare(strict_types=1);

namespace pbgroupeu\stacer_eu\tests\Controller\Administration;

use pbgroupeu\stacer_eu\Controller\Administration\ETLBasicsController;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ServerRequestInterface;

class ETLBasicsControllerTest extends \PHPUnit\Framework\TestCase
{
  /**
     * OOP case
     *
     * @covers ETLBasicsController
     * @return void
   */
  public function testOOP(): void
  {
    $controller = $this->createMock(ETLBasicsController::class);

    $this->assertIsObject($controller);
    $this->assertInstanceOf(ETLBasicsController::class, $controller);
  }

  /**
     * Implementation case
     *
     * @covers ETLBasicsController
     * @return void
   */
  public function testObjectImplementation(): void
  {
    $controller = $this->createMock(ETLBasicsController::class);

    $controller->expects($this->once())
      ->method('getTotalUsers')
      ->with($this->anything())
      ->willReturn(new Response());

    $controller->expects($this->once())
      ->method('getTotalLoans')
      ->with($this->anything())
      ->willReturn(new Response());

    $controller->expects($this->once())
      ->method('getTotalAuditBots')
      ->with($this->anything())
      ->willReturn(new Response());

    $controller->expects($this->once())
      ->method('getTotalPayments')
      ->with($this->anything())
      ->willReturn(new Response());

    $this->assertInstanceOf(Response::class, $controller->getTotalUsers($this->createStub(ServerRequestInterface::class)));
    $this->assertInstanceOf(Response::class, $controller->getTotalLoans($this->createStub(ServerRequestInterface::class)));
    $this->assertInstanceOf(Response::class, $controller->getTotalAuditBots($this->createStub(ServerRequestInterface::class)));
    $this->assertInstanceOf(Response::class, $controller->getTotalPayments($this->createStub(ServerRequestInterface::class)));
  }
}
