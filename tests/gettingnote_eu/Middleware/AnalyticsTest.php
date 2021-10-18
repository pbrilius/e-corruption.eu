<?php

namespace pbgroupeu\gettingnote_eu\tests\Middleware;

use pbgroupeu\gettingnote_eu\Middleware\Analytics;

class AnalyticsTest extends \PHPUnit\Framework\TestCase
{
  /**
     * Mocking object drill
     *
     * @covers Analytics
   */
  public function testProcessDevelopment(): void
  {
    $middleware = $this
      ->getMockBuilder(Analytics::class)
      ->disableOriginalConstructor()
      ->getMock();

    $this->assertObjectNotHasAttribute('emn', $middleware);
    $this->assertObjectNotHasAttribute('session', $middleware);
    $this->assertObjectNotHasAttribute('client', $middleware);
  }
}
