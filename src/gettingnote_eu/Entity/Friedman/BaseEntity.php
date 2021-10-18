<?php

namespace pbgroupeu\gettingnote_eu\Entity\Friedman;

abstract class BaseEntity implements BootstrapInterface
{
  abstract public function setDateOnPreInsert();

  abstract public function setDateOnPreUpdate();
}
