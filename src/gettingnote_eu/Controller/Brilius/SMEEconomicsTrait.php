<?php

namespace pbgroupeu\gettingnote_eu\Controller\Brilius;

trait SMEEconomicsTrait
{
  /**
     * @var array
   */
  private $allowedRoles = [];

  /**
     * SME Economics - RBAC
     *
     * @param array $roles
   */
  private function checkAccessForRoles(array $roles)
  {
    $nfcOK = false;
    foreach ($roles as $role) {
      if (in_array($role, $this->allowedRoles)) {
        $nfcOK = true;
        break;
      }
    }

    switch ($nfcOK) {
      case true:
        break;
      default:
        throw new Exception('Not authorized!');
    }
  }
}
