<?php

namespace pbgroupeu\getnote_eu\Entity\SME;

use pbgroupeu\gettingnote_eu\Entity\Friedman\DatingTrait;

/**
 * Transaction
 */
class Transaction extends \pbgroupeu\gettingnote_eu\Entity\Friedman\BaseEntity implements \JsonSerializable
{
    use DatingTrait;

    /**
     * @var string
     */
    private $total;

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
     * @var \pbgroupeu\getnote_eu\Entity\SME\Membership
     */
    private $membership;

    /**
     * @inheritdoc
     * @return array datamap
     */
    public function jsonSerialize(): array
    {
      return [
        'id' => $this->id,
        'datecreated' => $this->datecreated,
        'dateupdated' => $this->dateupdated,
        'total' => $this->total,
        'membership' => $this->membership->getType(),
      ];
    }


    /**
     * Set total.
     *
     * @param string $total
     *
     * @return Transaction
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total.
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set datecreated.
     *
     * @param \DateTime $datecreated
     *
     * @return Transaction
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
     * @return Transaction
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
     * Set membership.
     *
     * @param \pbgroupeu\getnote_eu\Entity\SME\Membership|null $membership
     *
     * @return Transaction
     */
    public function setMembership(\pbgroupeu\getnote_eu\Entity\SME\Membership $membership = null)
    {
        $this->membership = $membership;

        return $this;
    }

    /**
     * Get membership.
     *
     * @return \pbgroupeu\getnote_eu\Entity\SME\Membership|null
     */
    public function getMembership()
    {
        return $this->membership;
    }
}
