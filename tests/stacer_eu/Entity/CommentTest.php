<?php declare(strict_types=1);

namespace pbgroupeu\stacer_eu\tests\Entity;

use pbgroupeu\stacer_eu\Entity\Comment;

class CommentTest extends \PHPUnit\Framework\TestCase
{
  /**
     * TDD - FDD drills
     *
     * @covers User
   */
  public function testBasics(): void
  {
    $comment = new Comment();
    $this->assertIsObject($comment);
  }

  /**
     * JARM - ISSN, DOI
     *
     * @covers User
   */
  public function testAdvancedRAD(): void
  {
    $comment = $this
      ->getMockBuilder(Comment::class)
      ->disableArgumentCloning()
      ->disableOriginalConstructor();

    $this->assertObjectNotHasAttribute('user', $comment);
    $this->assertObjectNotHasAttribute('loan', $comment);
  }
}
