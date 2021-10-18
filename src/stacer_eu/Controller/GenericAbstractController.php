<?php

namespace pbgroupeu\stacer_eu\Controller;

use Doctrine\ORM\EntityManagerInterface;

class GenericAbstractController
{
  /**
     * @var Doctrine\ORM\EntityManagerInterface
   */
  private $emn;

  /**
     * @param EntityManagerInterface $emn
   */
  public function __construct(EntityManagerInterface $emn)
  {
    $this->emn = $emn;
  }

    /**
     * Get the value of Emn
     *
     * @return Doctrine\ORM\EntityManagerInterface
     */
    public function getEmn()
    {
        return $this->emn;
    }

}
