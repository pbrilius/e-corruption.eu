<?php

namespace pbgroupeu\gettingnote_eu\Entity;

/**
 * Note
 */
class Note implements \JsonSerializable
{
    /**
     * @var string
     */
    private $note;

    /**
     * @var \DateTime
     */
    private $timestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var json|null
     */
    private $attributes;

    /**
     * @var json|null
     */
    private $geotags;

    /**
     * @var int
     */
    private $id;

    /**
     * @var \pbgroupeu\stacer_eu\Entity\User
     */
    private $user;

    public function defaultAttributes()
    {
      $this->attributes = [
        'self',
        'administration',
      ];
    }

    public function jsonSerialize()
    {
      return [
        'id' => $this->id,
        'timestamp' => $this->timestamp,
        'geotags' => $this->geotags,
        'user' => [
          'email' => $this->user->getEmail(),
        ],
      ];
    }


    /**
     * Set note.
     *
     * @param string $note
     *
     * @return Note
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note.
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set timestamp.
     *
     * @param \DateTime $timestamp
     *
     * @return Note
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Set attributes.
     *
     * @param json|null $attributes
     *
     * @return Note
     */
    public function setAttributes($attributes = null)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Get attributes.
     *
     * @return json|null
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Get timestamp.
     *
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set geotags.
     *
     * @param json|null $geotags
     *
     * @return Note
     */
    public function setGeotags($geotags = null)
    {
        $this->geotags = $geotags;

        return $this;
    }

    /**
     * Get geotags.
     *
     * @return json|null
     */
    public function getGeotags()
    {
        return $this->geotags;
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
     * @return Note
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
