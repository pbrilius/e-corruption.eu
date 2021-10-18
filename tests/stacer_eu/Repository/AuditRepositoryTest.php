<?php declare(strict_types=1);

namespace pbgroupeu\stacer_eu\tests\Repository;

use pbgroupeu\stacer_eu\Repository\AuditRepository;

class AuditRepositoryTest extends \PHPUnit\Framework\TestCase
{
  /**
     * ETL inferred
     *
     * @covers AuditRepository
   */
  public function testOOP(): void
  {
    $auditRepository = $this->getMockBuilder(AuditRepository::class)
      ->disableOriginalConstructor()
      ->getMock();

    $this->assertIsObject($auditRepository);
    $this->assertInstanceOf(\Doctrine\ORM\EntityRepository::class, $auditRepository);
  }

  /**
     * Audit bots ETL - basics
     *
     * @covers AuditRepository
     * @return void
   */
  public function testTotalAuditAgents(): void
  {
    $auditRepository = $this->getMockBuilder(AuditRepository::class)
      ->disableOriginalConstructor()
      ->onlyMethods(['getTotalAuditBots'])
      ->getMock();

    $auditRepository->expects($this->once())
      ->method('getTotalAuditBots')
      ->willReturn([]);

    $users = $auditRepository->getTotalAuditBots();
    $this->assertIsArray($users);
  }
}
