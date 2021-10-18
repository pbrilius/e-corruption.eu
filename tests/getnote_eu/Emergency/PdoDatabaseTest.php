<?php declare(strict_types=1);

namespace pbgroupeu\getnote_eu\tests\Emergency;

class PdoDatabaseTest extends \PHPUnit\Framework\TestCase
{
  /**
   * Existencial problems
   *
   * @covers emergency/pdo-database.php
   * @return void
   */
  public function testPostExistentialism(): void
  {
    $this->assertTrue(\file_exists(__DIR__ . '/../../../emergency/pdo-database.php'));
  }
}
