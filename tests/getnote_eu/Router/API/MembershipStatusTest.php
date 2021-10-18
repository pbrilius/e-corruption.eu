<?php declare(strict_types=1);

namespace pbgroupeu\getnote_eu\tests\Router\API;

class MembershipStatusTest extends \PHPUnit\Framework\TestCase
{
  /**
   * @covers API/membership-status.php
   */
  public function testBaroque(): void
  {
    $this->assertTrue(file_exists(__DIR__ . '/../../../../routes/API/membership-status.php'));
  }
}
