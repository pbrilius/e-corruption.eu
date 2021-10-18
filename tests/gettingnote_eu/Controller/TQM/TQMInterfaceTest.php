<?php declare(strict_types=1);

namespace pbgroupeu\gettingnote_eu\tests\Controller\TQM;

use pbgroupeu\gettingnote_eu\Controller\TQM\TQMInterface;

class TQMInterfaceTest extends \PHPUnit\Framework\TestCase
{
  /**
     * @covers TQMInterface
     *
     * @return void
   */
  public function testImplementation(): void
  {
    $mock = $this->createMock(TQMInterface::class);

    $mock->expects($this->once())
      ->method('boot')
      ->will($this->returnValue(false));

    $this->assertNull($mock->boot());
  }
}
