<?php

namespace AppBundle\Entity;

/**
 * GwLieuscolarisation
 */
class GwLieuscolarisation
{
    /**
     * @var string
     */
    private $lieuscolarisation;

    /**
     * @var \DateTime
     */
    private $createdat;

    /**
     * @var \DateTime
     */
    private $updatedat;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set lieuscolarisation
     *
     * @param string $lieuscolarisation
     *
     * @return GwLieuscolarisation
     */
    public function setLieuscolarisation($lieuscolarisation)
    {
        $this->lieuscolarisation = $lieuscolarisation;

        return $this;
    }

    /**
     * Get lieuscolarisation
     *
     * @return string
     */
    public function getLieuscolarisation()
    {
        return $this->lieuscolarisation;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwLieuscolarisation
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
     * @return GwLieuscolarisation
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
