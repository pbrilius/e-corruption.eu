<?php declare(strict_types=1);

namespace pbgroupeu\gettingnote_eu\tests\Entity\Friedman;

use pbgroupeu\gettingnote_eu\Entity\Friedman\BootstrapInterface;

class BootstrapInferfaceTest extends \PHPUnit\Framework\TestCase
{
  /**
   * test Object implementation
   * @covers BootstrapInferface
   */
  public function testApplication(): void
  {
    $mock = $this->createMock(BootstrapInterface::class);

    $this->assertIsObject($mock);
    $this->assertInstanceOf(BootstrapInterface::class, $mock);

    $mock->expects($this->once())
      ->method('setDateOnPreInsert')
      ->will($this->returnValue($mock));

    $mock->expects($this->once())
      ->method('setDateOnPreUpdate')
      ->will($this->returnValue($mock));

    $this->assertInstanceOf(BootstrapInterface::class, $mock->setDateOnPreInsert());
    $this->assertInstanceOf(BootstrapInterface::class, $mock->setDateOnPreUpdate());
  }
}
