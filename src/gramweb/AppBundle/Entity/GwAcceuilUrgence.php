<?php

namespace AppBundle\Entity;

/**
 * GwAcceuilUrgence
 */
class GwAcceuilUrgence
{
    /**
     * @var string
     */
    private $nom;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return GwAcceuilUrgence
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwAcceuilUrgence
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
     * @return GwAcceuilUrgence
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
