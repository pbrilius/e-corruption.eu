<?php

namespace pbgroupeu\stacer_eu\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Twig\Environment;
use League\Config\Configuration;

abstract class AbstractFrontendController
{
  /**
     * @var Environment
   */
  protected $twig;

  /**
     * @var EntityManagerInterface
   */
  protected $emn;

  /**
     * @var \League\Config\Configuration
   */
  protected $eniac;

  /**
     * Contructor
     *
     * @param Configuration $eniac
     * @param Environment $twig
     * @param EntityManagerInteface $emn
   */
  public function __construct(Environment $twig, Configuration $eniac, EntityManagerInterface $emn)
  {
    $this->eniac = $eniac;
    $this->twig = $twig;
    $this->emn = $emn;
  }
}
