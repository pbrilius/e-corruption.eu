<?php declare(strict_types=1);

namespace pbgroupeu\stacer_eu\tests\Entity;

use pbgroupeu\stacer_eu\Entity\Payment;

class PaymentTest extends \PHPUnit\Framework\TestCase
{
  /**
     * TDD - FDD drills
     *
     * @covers User
   */
  public function testBasics(): void
  {
    $payment = new Payment();
    $this->assertIsObject($payment);
  }

  /**
     * JARM - ISSN, DOI
     *
     * @covers User
   */
  public function testAdvancedRAD(): void
  {
    $payment = $this
      ->getMockBuilder(Payment::class)
      ->disableArgumentCloning()
      ->disableOriginalConstructor();

    $this->assertObjectNotHasAttribute('loan', $payment);
    $this->assertObjectNotHasAttribute('user', $payment);
  }
}
