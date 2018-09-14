<?php

namespace AppBundle\Entity;

/**
 * GwOrganismePartenaire
 */
class GwOrganismePartenaire
{
    /**
     * @var integer
     */
    private $id;

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
     * @var boolean
     */
    private $cacher;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return GwOrganismePartenaire
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
     * @return GwOrganismePartenaire
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
     * @return GwOrganismePartenaire
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
     * @return GwOrganismePartenaire
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
}
