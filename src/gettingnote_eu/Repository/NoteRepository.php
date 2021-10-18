<?php

namespace pbgroupeu\gettingnote_eu\Repository;

use pbgroupeu\gettingnote_eu\Entity\Note;
use pbgroupeu\stacer_eu\Entity\User;

/**
 * NoteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NoteRepository extends \Doctrine\ORM\EntityRepository
{
  /**
     * @return array
   */
  public function getTotalUserNotes(User $user): array
  {
    $emn = $this->getEntityManager();
    $qbd = $emn->createQueryBuilder();


    $qbd->select('COUNT(n.id) AS totalNotes')
      ->from(Note::class, 'n')
      ->where('n.user = :user_id')
      ->setParameter('user_id', $user->getId());

    return $qbd->getQuery()->getResult();
  }
}