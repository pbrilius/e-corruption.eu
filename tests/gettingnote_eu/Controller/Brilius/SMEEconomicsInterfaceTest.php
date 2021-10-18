<?php declare(strict_types=1);

namespace pbgroupeu\gettingnote_eu\tests\Controller\Brilius;

use pbgroupeu\gettingnote_eu\Controller\Brilius\SMEEconomicsInterface;

class SMEEconomicsInterfaceTest extends \PHPUnit\Framework\TestCase
{
  /**
     * @covers SMEEconomicsInterface
   */
  public function testImplemetation(): void
  {
    $mock = $this->createMock(SMEEconomicsInterface::class);

    $mock->expects($this->once())
      ->method('boot')
      ->will($this->returnValue(false));

    $this->assertNull($mock->boot());
  }
}
