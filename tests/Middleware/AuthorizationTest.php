<?php

namespace Pbrilius\C2c\MvcPbgroupeu\tests\Middleware;

use Pbrilius\C2cMvcPbgroupeu\Middleware\Authorization;

class AuthorizationTest extends \PHPUnit\Framework\TestCase
{
  /**
     * Mocking object drill
     *
     * @covers Authentication
   */
  public function testProcessDevelopment(): void
  {
    $middleware = $this
      ->getMockBuilder(Authorization::class)
      ->disableOriginalConstructor()
      ->getMock();

    $this->assertObjectNotHasAttribute('emn', $middleware);
  }
}
