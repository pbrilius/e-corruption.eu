<?php

namespace pbgroupeu\stacer_eu\Entity;

/**
 * Loan
 */
class Loan implements \JsonSerializable
{
    /**
     * @var string
     */
    private $sum;

    /**
     * @var \DateTime
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     */
    private $payback;

    /**
     * @var string
     */
    private $interestrates;

    /**
     * @var int
     */
    private $id;

    /**
     * @var \pbgroupeu\stacer_eu\Entity\User
     */
    private $lender;

    /**
     * @var \pbgroupeu\stacer_eu\Entity\User
     */
    private $borrower;

    /**
     * @var \pbgroupeu\stacer_eu\Entity\Audit
     */
    private $audit;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $payments;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $comments;

    public function jsonSerialize()
    {
      return [
        'id' => $this->id,
        'sum' => $this->sum,
        'date' => $this->date,
        'payback' => $this->payback,
        'interestrates' => $this->interestrates,
        'lender' => $this->lender->getEmail(),
        'borrower' => $this->borrower->getEmail(),
        'payments' => count($this->payments->toArray()),
        'comments' => count($this->comments->toArray()),
      ];
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->payments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set sum.
     *
     * @param string $sum
     *
     * @return Loan
     */
    public function setSum($sum)
    {
        $this->sum = $sum;

        return $this;
    }

    /**
     * Get sum.
     *
     * @return string
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return Loan
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set payback.
     *
     * @param \DateTime $payback
     *
     * @return Loan
     */
    public function setPayback($payback)
    {
        $this->payback = $payback;

        return $this;
    }

    /**
     * Get payback.
     *
     * @return \DateTime
     */
    public function getPayback()
    {
        return $this->payback;
    }

    /**
     * Set interestrates.
     *
     * @param string $interestrates
     *
     * @return Loan
     */
    public function setInterestrates($interestrates)
    {
        $this->interestrates = $interestrates;

        return $this;
    }

    /**
     * Get interestrates.
     *
     * @return string
     */
    public function getInterestrates()
    {
        return $this->interestrates;
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
     * Set lender.
     *
     * @param \pbgroupeu\stacer_eu\Entity\User|null $lender
     *
     * @return Loan
     */
    public function setLender(\pbgroupeu\stacer_eu\Entity\User $lender = null)
    {
        $this->lender = $lender;

        return $this;
    }

    /**
     * Get lender.
     *
     * @return \pbgroupeu\stacer_eu\Entity\User|null
     */
    public function getLender()
    {
        return $this->lender;
    }

    /**
     * Set borrower.
     *
     * @param \pbgroupeu\stacer_eu\Entity\User|null $borrower
     *
     * @return Loan
     */
    public function setBorrower(\pbgroupeu\stacer_eu\Entity\User $borrower = null)
    {
        $this->borrower = $borrower;

        return $this;
    }

    /**
     * Get borrower.
     *
     * @return \pbgroupeu\stacer_eu\Entity\User|null
     */
    public function getBorrower()
    {
        return $this->borrower;
    }

    /**
     * Set audit.
     *
     * @param \pbgroupeu\stacer_eu\Entity\Audit|null $audit
     *
     * @return Loan
     */
    public function setAudit(\pbgroupeu\stacer_eu\Entity\Audit $audit = null)
    {
        $this->audit = $audit;

        return $this;
    }

    /**
     * Get audit.
     *
     * @return \pbgroupeu\stacer_eu\Entity\Audit|null
     */
    public function getAudit()
    {
        return $this->audit;
    }

    /**
     * Add payment.
     *
     * @param \pbgroupeu\stacer_eu\Entity\Payment $payment
     *
     * @return Loan
     */
    public function addPayment(\pbgroupeu\stacer_eu\Entity\Payment $payment)
    {
        $this->payments[] = $payment;

        return $this;
    }

    /**
     * Remove payment.
     *
     * @param \pbgroupeu\stacer_eu\Entity\Payment $payment
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePayment(\pbgroupeu\stacer_eu\Entity\Payment $payment)
    {
        return $this->payments->removeElement($payment);
    }

    /**
     * Get payments.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * Add comment.
     *
     * @param \pbgroupeu\stacer_eu\Entity\Comment $comment
     *
     * @return Loan
     */
    public function addComment(\pbgroupeu\stacer_eu\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment.
     *
     * @param \pbgroupeu\stacer_eu\Entity\Comment $comment
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeComment(\pbgroupeu\stacer_eu\Entity\Comment $comment)
    {
        return $this->comments->removeElement($comment);
    }

    /**
     * Get comments.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }
}
