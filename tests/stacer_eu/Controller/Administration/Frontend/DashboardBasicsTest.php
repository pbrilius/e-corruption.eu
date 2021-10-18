<?php declare(strict_types=1);

namespace pbgroupeu\stacer_eu\tests\Controller\Administration\Frontend;

use pbgroupeu\stacer_eu\Controller\Administration\Frontend\DashboardBasics;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class DashboardBasicsTest extends \PHPUnit\Framework\TestCase
{
  /**
     * ETL dashboard HTML
     *
     * @covers DashboardBasics
   */
  public function testBasicEtlDashboard(): void
  {
    $controller = $this->createMock(DashboardBasics::class);

    $controller
      ->expects($this->any())
      ->method('basicEtlDashboard')
      ->with($this->createStub(ServerRequestInterface::class))
      ->willReturn($this->createStub(ResponseInterface::class));

    $response = $controller->basicEtlDashboard($this->createStub(ServerRequestInterface::class));
    $this->assertInstanceOf(ResponseInterface::class, $response);
  }
}
