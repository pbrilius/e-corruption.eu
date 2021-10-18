<?php

namespace pbgroupeu\stacer_eu\Entity;

/**
 * Audit
 */
class Audit implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $label;

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
    private $payer;

    public function jsonSerialize()
    {
      return [
        'id' => $this->id,
        'label' => $this->label,
        'loan' => [
          'sum' => $this->loan->sum,
          'date' => $this->loan->date,
          'payback' => $this->loan->payback,
          'interestrates' => $this->loan->interestrates,
          'lender' => $this->loan->lender->getEmail(),
          'borrower' => $this->loan->borrower->getEmail(),
        ],
        'payer' => $this->payer->getEmail(),
      ];
    }


    /**
     * Set label.
     *
     * @param string|null $label
     *
     * @return Audit
     */
    public function setLabel($label = null)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label.
     *
     * @return string|null
     */
    public function getLabel()
    {
        return $this->label;
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
     * @return Audit
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
     * Set payer.
     *
     * @param \pbgroupeu\stacer_eu\Entity\User|null $payer
     *
     * @return Audit
     */
    public function setPayer(\pbgroupeu\stacer_eu\Entity\User $payer = null)
    {
        $this->payer = $payer;

        return $this;
    }

    /**
     * Get payer.
     *
     * @return \pbgroupeu\stacer_eu\Entity\User|null
     */
    public function getPayer()
    {
        return $this->payer;
    }
}
