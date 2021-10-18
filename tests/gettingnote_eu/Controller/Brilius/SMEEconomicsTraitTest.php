<?php

declare(strict_types=1);

namespace pbgroupeu\gettingnote_eu\tests\Controller\Brilius;

use pbgroupeu\gettingnote_eu\Controller\Brilius\SMEEconomicsTrait;

class SMEEconomicsTraitTest extends \PHPUnit\Framework\TestCase
{
  /**
     * @covers SMEEconomicsTrait
   */
  public function testObjectiveness(): void
  {
    $mock = $this->getMockForTrait(SMEEconomicsTrait::class);

    $this->assertIsObject($mock);
  }
}
