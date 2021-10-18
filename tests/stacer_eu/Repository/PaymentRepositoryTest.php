<?php declare(strict_types=1);

namespace pbgroupeu\stacer_eu\tests\Repository;

use pbgroupeu\stacer_eu\Repository\PaymentRepository;
use pbgroupeu\stacer_eu\Entity\User;

class PaymentRepositoryTest extends \PHPUnit\Framework\TestCase
{
  /**
     * ETL inferred
     *
     * @covers PaymentRepository
   */
  public function testOOP(): void
  {
    $paymentRepository = $this->getMockBuilder(PaymentRepository::class)
      ->disableOriginalConstructor()
      ->getMock();

    $this->assertIsObject($paymentRepository);
    $this->assertInstanceOf(\Doctrine\ORM\EntityRepository::class, $paymentRepository);
  }

  /**
     * Payment ETL - basics
     *
     * @covers PaymentRepository
     * @return void
   */
  public function testTotalPayments(): void
  {
    $paymentRepository = $this->getMockBuilder(PaymentRepository::class)
      ->disableOriginalConstructor()
      ->onlyMethods(['getTotalPayments'])
      ->getMock();

    $paymentRepository->expects($this->once())
      ->method('getTotalPayments')
      ->willReturn([]);

    $loans = $paymentRepository->getTotalPayments();
    $this->assertIsArray($loans);
  }

  /**
     * Payment ETL - basics; user scope
     *
     * @covers PaymentRepository
     * @return void
   */
  public function testTotalUserPayments(): void
  {
    $paymentRepository = $this->getMockBuilder(PaymentRepository::class)
      ->disableOriginalConstructor()
      ->onlyMethods(['getTotalUserPayments'])
      ->getMock();

    $paymentRepository->expects($this->once())
      ->method('getTotalUserPayments')
      ->with($this->createMock(User::class))
      ->willReturn([]);

    $loans = $paymentRepository->getTotalUserPayments($this->createStub(User::class));
    $this->assertIsArray($loans);
  }
}
