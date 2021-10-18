<?php declare(strict_types=1);

namespace pbgroupeu\getnote_eu\tests\Entity\SME;

use pbgroupeu\getnote_eu\Entity\SME\Transaction;

class TransactionTest extends \PHPUnit\Framework\TestCase
{
  /**
   * Unity test
   *
   * @covers Transaction
   */
  public function testObjectiveness(): void
  {
    $mock = $this->createMock(Transaction::class);

    $this->assertIsObject($mock);
    $this->assertInstanceOf(\JsonSerializable::class, $mock);
  }
}
