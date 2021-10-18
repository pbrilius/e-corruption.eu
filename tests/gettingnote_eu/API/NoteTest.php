<?php

namespace pbgroupeu\gettingnote_eu\tests\API;

class NoteTest extends \PHPUnit\Framework\TestCase
{
  /**
     * @covers api/note.php
   */
  public function testRouteExistance(): void
  {
    $this->assertTrue(file_exists(__DIR__ . '/../../../routes/API/note.php'));
  }
}
