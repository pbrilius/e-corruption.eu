<?php

namespace pbgroupeu\tests\gettingnote_eu\Entity;

use pbgroupeu\gettingnote_eu\Entity\Note;

class NoteTest extends \PHPUnit\Framework\TestCase
{
  /**
     * @covers Note
   */
  public function testOOP()
  {
    $note = $this->createMock(Note::class);
    $this->assertIsObject($note);
    $this->assertObjectNotHasAttribute('user', $note);
    $this->assertInstanceOf(\JsonSerializable::class, $note);
  }
}
