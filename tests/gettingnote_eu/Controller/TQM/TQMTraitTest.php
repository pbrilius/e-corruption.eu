<?php declare(strict_types=1);

namespace pbgroupeu\gettingnote_eu\tests\Controller\TQM;

use pbgroupeu\gettingnote_eu\Controller\TQM\TQMTrait;

class TQMTraitTest extends \PHPUnit\Framework\TestCase
{
  /**
     * @covers TQMTrait
     *
     * @return void
   */
  public function testOOP(): void
  {
    $mock = $this->getMockForTrait(TQMTrait::class);

    $this->assertIsObject($mock);
  }
}
