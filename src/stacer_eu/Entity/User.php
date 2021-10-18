<?php

namespace pbgroupeu\stacer_eu\Entity;

/**
 * User
 */
class User implements \JsonSerializable
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $hash;

    /**
     * @var json|null
     */
    private $roles;

    /**
     * @var int
     */
    private $id;

    /**
     * @var \pbgroupeu\stacer_eu\Entity\Loan
     */
    private $credit;

    /**
     * @var \pbgroupeu\stacer_eu\Entity\Loan
     */
    private $debit;

    /**
     * @var \pbgroupeu\stacer_eu\Entity\Audit
     */
    private $payerAudit;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $debtRepayments;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $comments;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $reactions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $notes;

    public function jsonSerialize()
    {
      return [
        'id' => $this->id,
        'email' => $this->email,
      ];
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->debtRepayments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reactions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->notes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set hash.
     *
     * @param string $hash
     *
     * @return User
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * Get hash.
     *
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Set roles.
     *
     * @param json|null $roles
     *
     * @return User
     */
    public function setRoles($roles = null)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles.
     *
     * @return json|null
     */
    public function getRoles()
    {
        return $this->roles;
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
     * Set credit.
     *
     * @param \pbgroupeu\stacer_eu\Entity\Loan|null $credit
     *
     * @return User
     */
    public function setCredit(\pbgroupeu\stacer_eu\Entity\Loan $credit = null)
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * Get credit.
     *
     * @return \pbgroupeu\stacer_eu\Entity\Loan|null
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * Set debit.
     *
     * @param \pbgroupeu\stacer_eu\Entity\Loan|null $debit
     *
     * @return User
     */
    public function setDebit(\pbgroupeu\stacer_eu\Entity\Loan $debit = null)
    {
        $this->debit = $debit;

        return $this;
    }

    /**
     * Get debit.
     *
     * @return \pbgroupeu\stacer_eu\Entity\Loan|null
     */
    public function getDebit()
    {
        return $this->debit;
    }

    /**
     * Set payerAudit.
     *
     * @param \pbgroupeu\stacer_eu\Entity\Audit|null $payerAudit
     *
     * @return User
     */
    public function setPayerAudit(\pbgroupeu\stacer_eu\Entity\Audit $payerAudit = null)
    {
        $this->payerAudit = $payerAudit;

        return $this;
    }

    /**
     * Get payerAudit.
     *
     * @return \pbgroupeu\stacer_eu\Entity\Audit|null
     */
    public function getPayerAudit()
    {
        return $this->payerAudit;
    }

    /**
     * Add debtRepayment.
     *
     * @param \pbgroupeu\stacer_eu\Entity\Payment $debtRepayment
     *
     * @return User
     */
    public function addDebtRepayment(\pbgroupeu\stacer_eu\Entity\Payment $debtRepayment)
    {
        $this->debtRepayments[] = $debtRepayment;

        return $this;
    }

    /**
     * Remove debtRepayment.
     *
     * @param \pbgroupeu\stacer_eu\Entity\Payment $debtRepayment
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeDebtRepayment(\pbgroupeu\stacer_eu\Entity\Payment $debtRepayment)
    {
        return $this->debtRepayments->removeElement($debtRepayment);
    }

    /**
     * Get debtRepayments.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDebtRepayments()
    {
        return $this->debtRepayments;
    }

    /**
     * Add comment.
     *
     * @param \pbgroupeu\stacer_eu\Entity\Comment $comment
     *
     * @return User
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

    /**
     * Add reaction.
     *
     * @param \pbgroupeu\stacer_eu\Entity\Reaction $reaction
     *
     * @return User
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
     * Add note.
     *
     * @param \pbgroupeu\gettingnote_eu\Entity\Note $note
     *
     * @return User
     */
    public function addNote(\pbgroupeu\gettingnote_eu\Entity\Note $note)
    {
        $this->notes[] = $note;

        return $this;
    }

    /**
     * Remove note.
     *
     * @param \pbgroupeu\gettingnote_eu\Entity\Note $note
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeNote(\pbgroupeu\gettingnote_eu\Entity\Note $note)
    {
        return $this->notes->removeElement($note);
    }

    /**
     * Get notes.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotes()
    {
        return $this->notes;
    }
}
