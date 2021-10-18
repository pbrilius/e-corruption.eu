<?php declare(strict_types=1);

namespace pbgroupeu\getnote_eu\tests\Entity\SME;

use pbgroupeu\getnote_eu\Entity\SME\Membership;

class MembershipTest extends \PHPUnit\Framework\TestCase
{
  /**
   * Unity test
   *
   * @covers Payer
   */
  public function testObjectiveness(): void
  {
    $mock = $this->createMock(Membership::class);

    $this->assertIsObject($mock);
    $this->assertInstanceOf(\JsonSerializable::class, $mock);
  }
}
