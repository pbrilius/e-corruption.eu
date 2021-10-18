<?php

namespace Pbrilius\C2c\MvcPbgroupeu\tests\Middleware;

use Pbrilius\C2cMvcPbgroupeu\Middleware\Authentication;

class AuthenticationTest extends \PHPUnit\Framework\TestCase
{
  /**
     * Mocking object drill
     *
     * @covers Authentication
   */
  public function testProcessDevelopment(): void
  {
    $middleware = $this
      ->getMockBuilder(Authentication::class)
      ->disableOriginalConstructor()
      ->getMock();

    $this->assertObjectNotHasAttribute('emn', $middleware);
  }
}
