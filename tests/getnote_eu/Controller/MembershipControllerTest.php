<?php declare(strict_types=1);

namespace pbgroupeu\getnote_eu\tests\Controller;

use pbgroupeu\getnote_eu\Controller\MembershipController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class MembershipControllerTest extends \PHPUnit\Framework\TestCase
{
  /**
   * Response ignition - instantiation
   *
   * @covers MembershipController
   */
  public function testVoidance(): void
  {
    $mock = $this->getMockBuilder(MembershipController::class)
      ->disableOriginalConstructor()
      ->getMock();

    $mock->expects($this->once())
      ->method('membershipStatus')
      ->with($this->createStub(ServerRequestInterface::class))
      ->willReturn($this->createStub(ResponseInterface::class));

    $this->assertInstanceOf(ResponseInterface::class, $mock->membershipStatus($this->createMock(ServerRequestInterface::class)));
  }
}
