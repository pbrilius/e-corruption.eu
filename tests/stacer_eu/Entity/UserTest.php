<?php declare(strict_types=1);

namespace pbgroupeu\stacer_eu\tests\Entity;

use pbgroupeu\stacer_eu\Entity\User;

class UserTest extends \PHPUnit\Framework\TestCase
{
  /**
     * TDD - FDD drills
     *
     * @covers User
   */
  public function testBasics(): void
  {
    $user = new User();
    $this->assertIsObject($user);
  }

  /**
     * JARM - ISSN, DOI
     *
     * @covers User
   */
  public function testAdvancedRAD(): void
  {
    $user = $this
      ->getMockBuilder(User::class)
      ->disableArgumentCloning()
      ->disableOriginalConstructor();

    $this->assertObjectNotHasAttribute('debtRepayments', $user);
  }
}
