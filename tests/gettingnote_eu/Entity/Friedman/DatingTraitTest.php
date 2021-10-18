<?php declare(strict_types=1);

namespace pbgroupeu\gettingnote_eu\tests\Entity\Friedman;

use pbgroupeu\gettingnote_eu\Entity\Friedman\DatingTrait;

class DatingTraitTest extends \PHPUnit\Framework\TestCase
{
  /**
   * Trait objectiveness
   *
   * @covers DatingTrait
   */
  public function testImplementation(): void
  {
    $mock = $this->getMockForTrait(DatingTrait::class);

    $this->assertIsObject($mock);
  }
}
