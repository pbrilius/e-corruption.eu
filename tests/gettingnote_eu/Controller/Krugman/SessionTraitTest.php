<?php declare(strict_types=1);

namespace pbgroupeu\tests\gettingnote_eu\Controller\Krugman;

use pbgroupeu\gettingnote_eu\Controller\Krugman\SessionTrait;

class SessionTraitTest extends \PHPUnit\Framework\TestCase
{
  /**
     * @covers SessionTrait
   */
  public function testTraitObjectiveness(): void
  {
    $mock = $this->getMockForTrait(SessionTrait::class);
    $this->assertIsObject($mock);
  }
}
