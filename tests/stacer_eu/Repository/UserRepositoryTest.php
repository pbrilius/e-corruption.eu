<?php declare(strict_types=1);

namespace pbgroupeu\stacer_eu\tests\Repository;

use pbgroupeu\stacer_eu\Repository\UserRepository;

class UserRepositoryTest extends \PHPUnit\Framework\TestCase
{
  /**
     * ETL inferred
     *
     * @covers UserRepository
   */
  public function testOOP(): void
  {
    $userRepository = $this->getMockBuilder(UserRepository::class)
      ->disableOriginalConstructor()
      ->getMock();

    $this->assertIsObject($userRepository);
    $this->assertInstanceOf(\Doctrine\ORM\EntityRepository::class, $userRepository);
  }

  /**
     * User ETL - basics
     *
     * @covers UserRepository
     * @return void
   */
  public function testTotalUsers(): void
  {
    $userRepository = $this->getMockBuilder(UserRepository::class)
      ->disableOriginalConstructor()
      ->onlyMethods(['getTotalUsers'])
      ->getMock();

    $userRepository->expects($this->once())
      ->method('getTotalUsers')
      ->willReturn([]);

    $loans = $userRepository->getTotalUsers();
    $this->assertIsArray($loans);
  }

  /**
   * Covers membership status R&D
   *
   * @covers UserRepository::getMembershipStatus
   */
  public function testMembershipStatus(): void
  {
    $userRepository = $this->getMockBuilder(UserRepository::class)
      ->disableOriginalConstructor()
      ->onlyMethods(['getMembershipStatus'])
      ->getMock();

    $programmer = 'programmer@pbgroupeu.com';
    $userRepository->expects($this->once())
      ->method('getMembershipStatus')
      ->with($programmer)
      ->willReturn([]);

    $membershpStatus = $userRepository->getMembershipStatus($programmer);
    $this->assertIsArray($membershpStatus);
  }
}
