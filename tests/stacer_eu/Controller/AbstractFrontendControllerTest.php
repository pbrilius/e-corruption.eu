<?php declare(strict_types=1);

namespace pbgroupeu\stacer_eu\tests\Controller;

use pbgroupeu\stacer_eu\Controller\AbstractFrontendController;

class AbstractFrontendControllerTest extends \PHPUnit\Framework\TestCase
{
  /**
     * OOP case
     *
     * @covers AbstractFrontendController
     * @return void
   */
  public function testOop()
  {
    $controller = $this
      ->getMockBuilder(AbstractFrontendController::class)
      ->disableOriginalConstructor()
      ->getMockForAbstractClass();

    $this->assertIsObject($controller);
  }
}
