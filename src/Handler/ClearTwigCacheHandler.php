<?php

namespace Pbrilius\C2cMvcPbgroupeu\Handler;

use Pbrilius\C2cMvcPbgroupeu\Command\ClearTwigCache;

class ClearTwigCacheHandler
{
  /**
     * Cache directory
     *
     * @var string
   */
  private $cacheDirectory;

  public function __construct(string $cacheDirectory)
  {
      $this->cacheDirectory = $cacheDirectory;
  }

  public function handle(ClearTwigCache $cocheCleaner)
  {
    $cocheCleaner->cacheDirectoy = $this->cacheDirectory;

    shell_exec('rm -rdfv ' . __DIR__ . '/../../' . $this->cacheDirectory . '/*');
  }
}
