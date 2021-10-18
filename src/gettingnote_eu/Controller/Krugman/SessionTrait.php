<?php

namespace pbgroupeu\gettingnote_eu\Controller\Krugman;

trait SessionTrait
{
  /**
     * @var Session $session
   */
  private $session;

  /**
   * Get the value of Session
   *
   * @return Session $session
   */
  public function getSession()
  {
      return $this->session;
  }

  /**
   * Set the value of Session
   *
   * @param Session $session $session
   *
   * @return self
   */
  public function setSession(\Session $session)
  {
      $this->session = $session;

      return $this;
  }

}
