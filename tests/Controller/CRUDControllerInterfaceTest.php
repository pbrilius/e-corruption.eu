<?php declare(strict_types=1);

namespace Pbrilius\C2cMvcPbgroupeu\Tests\Controller;

use Pbgrilius\C2cMvcPbgroupeu\Controller\CRUDControllerInterface;

class CRUDControllerInterfaceTest extends \PHPUnit\Framework\TestCase
{
  /**
     * Unit case - simulation
     *
     * @covers CRUDControllerInterface
   */
  public function testInterfaceImplementation(): void
  {
    $mockedObject = $this->getMockBuilder(CRUDControllerInterfaceTest::class)
      ->getMock();

    $this->assertInstanceOf(CRUDControllerInterfaceTest::class, $mockedObject);
  }
}
