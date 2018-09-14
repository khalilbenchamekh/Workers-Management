<?php

namespace AppBundle\Entity;

/**
 * GwOccasionContact
 */
class GwOccasionContact
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var \DateTime
     */
    private $createdat;

    /**
     * @var \DateTime
     */
    private $updatedat;

    /**
     * @var boolean
     */
    private $cacher;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set title
     *
     * @param string $title
     *
     * @return GwOccasionContact
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwOccasionContact
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;

        return $this;
    }

    /**
     * Get createdat
     *
     * @return \DateTime
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * Set updatedat
     *
     * @param \DateTime $updatedat
     *
     * @return GwOccasionContact
     */
    public function setUpdatedat($updatedat)
    {
        $this->updatedat = $updatedat;

        return $this;
    }

    /**
     * Get updatedat
     *
     * @return \DateTime
     */
    public function getUpdatedat()
    {
        return $this->updatedat;
    }

    /**
     * Set cacher
     *
     * @param boolean $cacher
     *
     * @return GwOccasionContact
     */
    public function setCacher($cacher)
    {
        $this->cacher = $cacher;

        return $this;
    }

    /**
     * Get cacher
     *
     * @return boolean
     */
    public function getCacher()
    {
        return $this->cacher;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
