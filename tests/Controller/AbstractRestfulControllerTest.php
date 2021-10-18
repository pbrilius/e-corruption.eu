<?php declare(strict_types=1);

namespace Pbrilius\C2cMvc\Pbgroupeu\tests\Controller;

use Pbrilius\C2cMvcPbgroupeu\Controller\AbstractRestfulController;
use Pbrilius\C2cMvcPbgroupeu\Controller\CRUDControllerInterface;

class AbstractRestfulControllerTest extends \PHPUnit\Framework\TestCase
{
  /**
     * Unit case - simulation
     *
     * @covers AbstractRestfulController
   */
  public function testImplementation(): void
  {
    $abstractController = $this
      ->getMockBuilder(AbstractRestfulController::class)
      ->disableOriginalConstructor()
      ->getMockForAbstractClass();

    $this->assertInstanceOf(CRUDControllerInterface::class, $abstractController);
  }
}
