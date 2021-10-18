<?php declare(strict_types=1);

namespace pbgroupeu\stacer_eu\tests\Entity;

use pbgroupeu\stacer_eu\Entity\Loan;

class LoanTest extends \PHPUnit\Framework\TestCase
{
  /**
     * TDD - FDD drills
     *
     * @covers User
   */
  public function testBasics(): void
  {
    $loan = new Loan();
    $this->assertIsObject($loan);
  }

  /**
     * JARM - ISSN, DOI
     *
     * @covers User
   */
  public function testAdvancedRAD(): void
  {
    $loan = $this
      ->getMockBuilder(Loan::class)
      ->disableArgumentCloning()
      ->disableOriginalConstructor();

    $this->assertObjectNotHasAttribute('payments', $loan);
  }
}
