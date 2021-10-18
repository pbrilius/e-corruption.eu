<?php

namespace pbgroupeu\gettingnote_eu\Entity\Friedman;

interface BootstrapInterface
{
  /**
   * Dating subject & object
   *
   */
  public function setDateOnPreInsert();

  /**
   * Dating subject & object
   *
   */
  public function setDateOnPreUpdate();
}
