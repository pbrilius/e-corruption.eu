<?php declare(strict_types=1);

namespace pbgroupeu\stacer_eu\tests\Controller;

use pbgroupeu\stacer_eu\Controller\GenericAbstractController;
use Doctrine\ORM\EntityManagerInterface;

class GenericAbstractControllerTest extends \PHPUnit\Framework\TestCase
{
  /**
     * TDD - OOP
     *
     * @covers GenericAbstractController
   */
  public function testObjectiveness(): void
  {
    $genericController = $this->getMockBuilder(GenericAbstractController::class)
      ->disableOriginalConstructor()
      ->onlyMethods(['getEmn'])
      ->getMockForAbstractClass();

    $emnMock = $this->createMock(EntityManagerInterface::class);

    $genericController->expects($this->any())
      ->method('getEmn')
      ->willReturn($emnMock);

    $this->assertInstanceOf(EntityManagerInterface::class, $genericController->getEmn());
  }
}
