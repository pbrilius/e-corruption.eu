<?php declare(strict_types=1);

namespace pbgroupeu\stacer_eu\tests\Entity;

use pbgroupeu\stacer_eu\Entity\Reaction;

class ReactionTest extends \PHPUnit\Framework\TestCase
{
  /**
     * TDD - FDD drills
     *
     * @covers User
   */
  public function testBasics(): void
  {
    $reaction = new Reaction();
    $this->assertIsObject($reaction);
  }

  /**
     * JARM - ISSN, DOI
     *
     * @covers User
   */
  public function testAdvancedRAD(): void
  {
    $reaction = $this
      ->getMockBuilder(Reaction::class)
      ->disableArgumentCloning()
      ->disableOriginalConstructor();

    $this->assertObjectNotHasAttribute('payment', $reaction);
    $this->assertObjectNotHasAttribute('user', $reaction);
  }
}
