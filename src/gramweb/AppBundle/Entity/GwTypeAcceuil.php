<?php

namespace AppBundle\Entity;

/**
 * GwTypeAcceuil
 */
class GwTypeAcceuil
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
     * @var boolean
     */
    private $afficher;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return GwTypeAcceuil
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
     * @return GwTypeAcceuil
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
     * @return GwTypeAcceuil
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
     * Set afficher
     *
     * @param boolean $afficher
     *
     * @return GwTypeAcceuil
     */
    public function setAfficher($afficher)
    {
        $this->afficher = $afficher;

        return $this;
    }

    /**
     * Get afficher
     *
     * @return boolean
     */
    public function getAfficher()
    {
        return $this->afficher;
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
