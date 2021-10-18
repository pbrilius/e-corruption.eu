<?php

namespace pbgroupeu\stacer_eu\Entity;

/**
 * Payment
 */
class Payment implements \JsonSerializable
{
    /**
     * @var string
     */
    private $amount;

    /**
     * @var \DateTime
     */
    private $dateSubmitted;

    /**
     * @var int
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $reactions;

    /**
     * @var \pbgroupeu\stacer_eu\Entity\Loan
     */
    private $loan;

    /**
     * @var \pbgroupeu\stacer_eu\Entity\User
     */
    private $user;

    public function jsonSerialize()
    {
      return [
        'id' => $this->id,
        'amount' => $this->amount,
        'dateSubmitted' => $this->dateSubmitted,
        'reactions' => count($this->reactions->toArray()),
        'user' => $this->user->getEmail(),
      ];
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reactions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set amount.
     *
     * @param string $amount
     *
     * @return Payment
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount.
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set dateSubmitted.
     *
     * @param \DateTime $dateSubmitted
     *
     * @return Payment
     */
    public function setDateSubmitted($dateSubmitted)
    {
        $this->dateSubmitted = $dateSubmitted;

        return $this;
    }

    /**
     * Get dateSubmitted.
     *
     * @return \DateTime
     */
    public function getDateSubmitted()
    {
        return $this->dateSubmitted;
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
     * Add reaction.
     *
     * @param \pbgroupeu\stacer_eu\Entity\Reaction $reaction
     *
     * @return Payment
     */
    public function addReaction(\pbgroupeu\stacer_eu\Entity\Reaction $reaction)
    {
        $this->reactions[] = $reaction;

        return $this;
    }

    /**
     * Remove reaction.
     *
     * @param \pbgroupeu\stacer_eu\Entity\Reaction $reaction
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeReaction(\pbgroupeu\stacer_eu\Entity\Reaction $reaction)
    {
        return $this->reactions->removeElement($reaction);
    }

    /**
     * Get reactions.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReactions()
    {
        return $this->reactions;
    }

    /**
     * Set loan.
     *
     * @param \pbgroupeu\stacer_eu\Entity\Loan|null $loan
     *
     * @return Payment
     */
    public function setLoan(\pbgroupeu\stacer_eu\Entity\Loan $loan = null)
    {
        $this->loan = $loan;

        return $this;
    }

    /**
     * Get loan.
     *
     * @return \pbgroupeu\stacer_eu\Entity\Loan|null
     */
    public function getLoan()
    {
        return $this->loan;
    }

    /**
     * Set user.
     *
     * @param \pbgroupeu\stacer_eu\Entity\User|null $user
     *
     * @return Payment
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
}
