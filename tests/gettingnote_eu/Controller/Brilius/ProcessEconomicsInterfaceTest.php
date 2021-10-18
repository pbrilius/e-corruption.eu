<?php declare(strict_types=1);

namespace pbgroupeu\tests\gettingnote_eu\Controller\Brilius;

use pbgroupeu\gettingnote_eu\Controller\Brilius\ProcessEconomicsInterface;

class ProcessEconomicsInterfaceTest extends \PHPUnit\Framework\TestCase
{
  /**
     * @covers ProcessEconomicsInterface
   */
  public function testObjectiveness(): void
  {
    $interface = $this->createMock(ProcessEconomicsInterface::class);

    $this->assertInstanceOf(ProcessEconomicsInterface::class, $interface);
    $this->assertIsObject($interface);
  }
}
