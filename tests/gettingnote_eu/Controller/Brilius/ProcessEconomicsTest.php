<?php declare(strict_types=1);

namespace pbgroupeu\tests\gettingnote_eu\Controller\Brilius;

use pbgroupeu\gettingnote_eu\Controller\Brilius\ProcessEconomics;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProcessEconomicsTest extends \PHPUnit\Framework\TestCase
{
  /**
     * @covers ProcessEconomics
   */
  public function testInheritance(): void
  {
    $mock = $this
      ->getMockBuilder(ProcessEconomics::class)
      ->disableOriginalConstructor()
      ->getMock();

    $mock
      ->expects($this->any())
      ->method('guest')
      ->with($this->createStub(ServerRequestInterface::class))
      ->willReturn($this->createStub(ResponseInterface::class));

    $response = $mock->guest($this->createMock(ServerRequestInterface::class));
    $this->assertInstanceOf(ResponseInterface::class, $response);

    $mock
      ->expects($this->any())
      ->method('home')
      ->with($this->createStub(ServerRequestInterface::class))
      ->willReturn($this->createStub(ResponseInterface::class));

    $response = $mock->home($this->createMock(ServerRequestInterface::class));
    $this->assertInstanceOf(ResponseInterface::class, $response);

  }
}
