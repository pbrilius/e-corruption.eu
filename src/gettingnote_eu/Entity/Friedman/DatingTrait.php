<?php

namespace pbgroupeu\gettingnote_eu\Entity\Friedman;

trait DatingTrait
{
  /**
   * @inheritdoc
   */
  public function setDateOnPreInsert()
  {
    $this->datecreated = new \DateTime();
  }

  /**
   * @inheritdoc
   */
  public function setDateOnPreUpdate()
  {
    $this->dateupdated = new \DateTime();
  }

}
