<?php

namespace pbgroupeu\stacer_eu\Repository;

use Doctrine\ORM\Query\ResultSetMapping;
use pbgroupeu\stacer_eu\Entity\Audit;


/**
 * AuditRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AuditRepository extends \Doctrine\ORM\EntityRepository
{
  /**
     * Auditions by bots
     *
     * @return array
   */
  public function getTotalAuditBots(): array
  {
    $emn = $this->getEntityManager();

    $qbd = $emn->createQueryBuilder();
    $qbd->select('COUNT (a.id) AS totalAudits')
      ->from(Audit::class, 'a');

    return $qbd->getQuery()->getResult();
  }
}
