<?php

namespace pbgroupeu\stacer_eu\Entity;

/**
 * Comment
 */
class Comment implements \JsonSerializable
{
    /**
     * @var string
     */
    private $comment;

    /**
     * @var int
     */
    private $id;

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
        'comment' => $this->comment,
        'user' => $this->user->getEmail(),
        'loan' => [
          'sum' => $this->loan->sum,
          'date' => $this->loan->date,
          'payback' => $this->loan->payback,
          'interestrates' => $this->loan->interestrates,
          'lender' => $this->loan->lender->getEmail(),
          'borrower' => $this->loan->borrower->getEmail(),
        ],
      ];
    }


    /**
     * Set comment.
     *
     * @param string $comment
     *
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment.
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
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
     * Set loan.
     *
     * @param \pbgroupeu\stacer_eu\Entity\Loan|null $loan
     *
     * @return Comment
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
     * @return Comment
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
