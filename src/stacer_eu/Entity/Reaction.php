<?php

namespace pbgroupeu\stacer_eu\Entity;

/**
 * Reaction
 */
class Reaction implements \JsonSerializable
{
    /**
     * @var json
     */
    private $reaction;

    /**
     * @var int
     */
    private $id;

    /**
     * @var \pbgroupeu\stacer_eu\Entity\Payment
     */
    private $payment;

    /**
     * @var \pbgroupeu\stacer_eu\Entity\User
     */
    private $user;

    public function jsonSerialize()
    {
      return [
        'id' => $this->id,
        'reaction' => $this->reaction,
        'payment' => [
          'amount' => $this->payment->amount,
          'dateSubmitted' => $this->payment->dateSubmitted,
        ],
        'user' => $this->user->email,
      ];
    }


    /**
     * Set reaction.
     *
     * @param json $reaction
     *
     * @return Reaction
     */
    public function setReaction($reaction)
    {
        $this->reaction = $reaction;

        return $this;
    }

    /**
     * Get reaction.
     *
     * @return json
     */
    public function getReaction()
    {
        return $this->reaction;
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
     * Set payment.
     *
     * @param \pbgroupeu\stacer_eu\Entity\Payment|null $payment
     *
     * @return Reaction
     */
    public function setPayment(\pbgroupeu\stacer_eu\Entity\Payment $payment = null)
    {
        $this->payment = $payment;

        return $this;
    }

    /**
     * Get payment.
     *
     * @return \pbgroupeu\stacer_eu\Entity\Payment|null
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * Set user.
     *
     * @param \pbgroupeu\stacer_eu\Entity\User|null $user
     *
     * @return Reaction
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
