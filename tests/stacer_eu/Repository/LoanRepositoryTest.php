<?php declare(strict_types=1);

namespace pbgroupeu\stacer_eu\tests\Repository;

use pbgroupeu\stacer_eu\Repository\LoanRepository;

class LoanRepositoryTest extends \PHPUnit\Framework\TestCase
{
  /**
     * ETL inferred
     *
     * @covers LoanRepository
   */
  public function testOOP(): void
  {
    $loanRepository = $this->getMockBuilder(LoanRepository::class)
      ->disableOriginalConstructor()
      ->getMock();

    $this->assertIsObject($loanRepository);
    $this->assertInstanceOf(\Doctrine\ORM\EntityRepository::class, $loanRepository);
  }

  /**
     * Loan ETL - basics
     *
     * @covers LoanRepository
     * @return void
   */
  public function testTotalLoans(): void
  {
    $loanRepository = $this->getMockBuilder(LoanRepository::class)
      ->disableOriginalConstructor()
      ->onlyMethods(['getTotalLoans'])
      ->getMock();

    $loanRepository->expects($this->once())
      ->method('getTotalLoans')
      ->willReturn([]);

    $loans = $loanRepository->getTotalLoans();
    $this->assertIsArray($loans);
  }
}
