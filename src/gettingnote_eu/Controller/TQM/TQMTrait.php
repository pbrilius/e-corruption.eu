<?php

namespace pbgroupeu\gettingnote_eu\Controller\TQM;

use pbgroupeu\stacer_eu\Entity\User;

trait TQMTrait
{
  /**
     * @var array $allowedAttributes
   */
  private $allowedAttributes = [];

  /**
     * @param array $attributes
     * @param User $user
     *
     * @return void
     *
     * @todo finalize the callee
   */
  private function checkAgainstAttributes(array $attributes, User $querier, User $target): void
  {
    $nfcPass = false;
    foreach ($this->allowedAttributes as $allowance) {
      if (in_array($allowance, $attributes)) {
        switch ($allowance) {
          case 'self':
              $nfcPass = $querier->getId() === $target->getId();
            break;
          case 'administration':
              $nfcPass = in_array('administrator', $querier->getRoles());
            break;
          case 'others':
              $nfcPass = $querier->getId() !== $target->getId();
            break;
          default:
            break;
        }
      }
    }

    switch ($nfcPass) {
      case true:
        break;
      default:
        throw new \Exception('Not attributed to operate - unauthorized!');
    }
  }
}
