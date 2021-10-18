<?php declare(strict_types=1);

namespace pbgroupeu\gettingnote_eu\tests\Repository;

use pbgroupeu\gettingnote_eu\Repository\NoteRepository;
use pbgroupeu\stacer_eu\Entity\User;

class NoteRepositoryTest extends \PHPUnit\Framework\TestCase
{
  /**
     * ETL inferred
     *
     * @covers NoteRepository
   */
  public function testOOP(): void
  {
    $noteRepository = $this->getMockBuilder(NoteRepository::class)
      ->disableOriginalConstructor()
      ->getMock();

    $this->assertIsObject($noteRepository);
    $this->assertInstanceOf(\Doctrine\ORM\EntityRepository::class, $noteRepository);
  }

  /**
     * Note ETL - user basics
     *
     * @covers NoteRepository
     * @return void
   */
  public function testTotalUserNotes(): void
  {
    $noteRepository = $this->getMockBuilder(NoteRepository::class)
      ->disableOriginalConstructor()
      ->onlyMethods(['getTotalUserNotes'])
      ->getMock();

    $noteRepository->expects($this->once())
      ->method('getTotalUserNotes')
      ->with($this->createMock(User::class))
      ->willReturn([]);

    $notes = $noteRepository->getTotalUserNotes($this->createStub(User::class));
    $this->assertIsArray($notes);
  }
}
