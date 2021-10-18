<?php

namespace Pbrilius\C2cMvcPbgroupeu\tests\Command;

use Pbrilius\C2cMvcPbgroupeu\Command\ClearTwigCache;

class ClearTwigCacheTest extends \PHPUnit\Framework\TestCase
{
  /**
     * Drill case
     *
     * @covers ClearTwigCache
   */
  public function testPublicProperties()
  {
    $mock = new ClearTwigCache();

    $this->assertObjectHasAttribute('cacheDirectory', $mock);
  }
}
