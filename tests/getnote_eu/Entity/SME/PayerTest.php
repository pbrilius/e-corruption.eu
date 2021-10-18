<?php declare(strict_types=1);

namespace pbgroupeu\getnote_eu\tests\Entity\SME;

use pbgroupeu\getnote_eu\Entity\SME\Payer;

class PayerTest extends \PHPUnit\Framework\TestCase
{
  /**
   * Unity test
   *
   * @covers Payer
   */
  public function testObjectiveness(): void
  {
    $mock = $this->createMock(Payer::class);

    $this->assertIsObject($mock);
    $this->assertInstanceOf(\JsonSerializable::class, $mock);
  }
}
