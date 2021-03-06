<?php

namespace pbgroupeu\stacer_eu\Repository;

use Doctrine\ORM\Query\ResultSetMapping;
use pbgroupeu\stacer_eu\Entity\Loan;

/**
 * LoanRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LoanRepository extends \Doctrine\ORM\EntityRepository
{
  /**
     * Total loans
     *
     * @return array
   */
  public function getTotalLoans(): array
  {
    $emn = $this->getEntityManager();

    $qbd = $emn->createQueryBuilder();
    $qbd->select('COUNT (l.id) AS totalLoans')
      ->from(Loan::class, 'l');

    return $qbd->getQuery()->getResult();
  }
}
