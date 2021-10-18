<?php declare(strict_types=1);

namespace pbgroupeu\gettingnote_eu\tests\Entity\Friedman;

use pbgroupeu\gettingnote_eu\Entity\Friedman\BaseEntity;

class BaseEntityTest extends \PHPUnit\Framework\TestCase
{
  /**
   * Getters interpolation
   *
   * @covers BaseEntity
   */
  public function testObjectiveness(): void
  {
    $mock = $this->getMockForAbstractClass(BaseEntity::class);

    $this->assertIsObject($mock);
    $this->assertObjectNotHasAttribute('dateupdated', $mock);
    $this->assertObjectNotHasAttribute('dateinserted', $mock);
  }
}
