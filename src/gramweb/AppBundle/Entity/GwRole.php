<?php

namespace AppBundle\Entity;

/**
 * GwRole
 */
class GwRole
{
    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $droits;

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
     * Set titre
     *
     * @param string $titre
     *
     * @return GwRole
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set droits
     *
     * @param string $droits
     *
     * @return GwRole
     */
    public function setDroits($droits)
    {
        $this->droits = $droits;

        return $this;
    }

    /**
     * Get droits
     *
     * @return string
     */
    public function getDroits()
    {
        return $this->droits;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwRole
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
     * @return GwRole
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
