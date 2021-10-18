<?php declare(strict_types=1);

namespace pbgroupeu\tests\gettingnote_eu\Controller\Krugman;

use pbgroupeu\gettingnote_eu\Controller\Krugman;

class EconomicsTest extends \PHPUnit\Framework\TestCase
{
  /**
     * @covers
   */
  public function testInheritance(): void
  {
    $controller = $this->getMockBuilder(Krugman::class)
      ->disableOriginalConstructor()
      ->getMock();

    $this->assertInstanceOf(Krugman::class, $controller);
    $this->assertIsObject($controller);
  }
}
