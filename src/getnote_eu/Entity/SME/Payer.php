<?php

namespace pbgroupeu\getnote_eu\Entity\SME;

use pbgroupeu\gettingnote_eu\Entity\Friedman\DatingTrait;

/**
 * Payer
 */
class Payer extends \pbgroupeu\gettingnote_eu\Entity\Friedman\BaseEntity implements \JsonSerializable
{
    use DatingTrait;

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
     * @var \pbgroupeu\stacer_eu\Entity\User
     */
    private $user;

    /**
     * @var \pbgroupeu\getnote_eu\Entity\SME\Transaction
     */
    private $transaction;

    /**
     * @inheritdoc
     * @return array datamap
     */
    public function jsonSerialize(): array
    {
      return [
        'id' => $this->id,
        'user' => $this->user->getEmail(),
        'transaction' => $this->transaction->getTotal(),
        'datecreated' => $this->datecreated,
        'dateupdated' => $this->dateupdated,
      ];
    }


    /**
     * Set datecreated.
     *
     * @param \DateTime $datecreated
     *
     * @return Payer
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
     * @return Payer
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

    /**
     * Set user.
     *
     * @param \pbgroupeu\stacer_eu\Entity\User|null $user
     *
     * @return Payer
     */
    public function setUser(\pbgroupeu\stacer_eu\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \pbgroupeu\stacer_eu\Entity\User|null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set transaction.
     *
     * @param \pbgroupeu\getnote_eu\Entity\SME\Transaction|null $transaction
     *
     * @return Payer
     */
    public function setTransaction(\pbgroupeu\getnote_eu\Entity\SME\Transaction $transaction = null)
    {
        $this->transaction = $transaction;

        return $this;
    }

    /**
     * Get transaction.
     *
     * @return \pbgroupeu\getnote_eu\Entity\SME\Transaction|null
     */
    public function getTransaction()
    {
        return $this->transaction;
    }
}
