<?php declare(strict_types=1);

namespace pbgroupeu\gettingnote_eu\tests\Controller\Krugman;

use pbgroupeu\gettingnote_eu\Controller\Krugman\EmergencyAccess;

class EmergencyAccessTest extends \PHPUnit\Framework\TestCase
{
  /**
   * Trait non privacy properties
   *
   * @covers EmergencyAccess
   */
  public function testTrait(): void
  {
    $mock = $this->getMockForTrait(EmergencyAccess::class);
    $this->assertIsObject($mock);
    $this->assertObjectNotHasAttribute('pdo', $mock);
  }
}
