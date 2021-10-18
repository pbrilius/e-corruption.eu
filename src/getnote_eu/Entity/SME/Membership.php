<?php

namespace pbgroupeu\getnote_eu\Entity\SME;

use pbgroupeu\gettingnote_eu\Entity\Friedman\DatingTrait;
use pbgroupeu\getnote_eu\Entity\SME\Transaction;

/**
 * Membership
 */
class Membership extends \pbgroupeu\gettingnote_eu\Entity\Friedman\BaseEntity implements \JsonSerializable
{
  use DatingTrait;

    /**
     * @var string
     */
    private $type;

    /**
     * @var \DateTime
     */
    private $datecreated;

    /**
     * @var \DateTime|null
     */
    private $dateupdated;

    /**
     * @var int
     */
    private $id;

    /**
     * Transation
     * @var \pbgroupeu\getnote_eu\Entity\SME\Transaction;
     */
    private $transaction;

    /**
     * Transaction getter
     * @return Transaction object
     */
    public function getTransaction(): Transaction
    {
      return $this->transaction;
    }

    /**
     * Transaction setter
     * @param  Transaction $transaction               Transaction
     * @return self                     Object of Entity
     */
    public function setTransaction(Transaction $transaction): self
    {
      $this->transaction = $Transaction;

      return $this;
    }

    /**
     * @inheritdoc
     * @return array datamap
     */
    public function jsonSerialize(): array
    {
      return [
        'id' => $this->id,
        'type' => $this->type,
        'datecreated' => $this->datecreated,
        'dateupdated' => $this->dateupdated,
      ];
    }


    /**
     * Set type.
     *
     * @param string $type
     *
     * @return Membership
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set datecreated.
     *
     * @param \DateTime $datecreated
     *
     * @return Membership
     */
    public function setDatecreated($datecreated)
    {
        $this->datecreated = $datecreated;

        return $this;
    }

    /**
     * Get datecreated.
     *
     * @return \DateTime
     */
    public function getDatecreated()
    {
        return $this->datecreated;
    }

    /**
     * Set dateupdated.
     *
     * @param \DateTime|null $dateupdated
     *
     * @return Membership
     */
    public function setDateupdated($dateupdated = null)
    {
        $this->dateupdated = $dateupdated;

        return $this;
    }

    /**
     * Get dateupdated.
     *
     * @return \DateTime|null
     */
    public function getDateupdated()
    {
        return $this->dateupdated;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
