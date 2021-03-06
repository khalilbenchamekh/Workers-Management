<?php

namespace AppBundle\Entity;

/**
 * GwFormation
 */
class GwFormation
{
    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $detail;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\GwNomformation
     */
    private $nom;

    /**
     * @var \AppBundle\Entity\GwAm
     */
    private $assmat;


    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return GwFormation
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
     * Set detail
     *
     * @param string $detail
     *
     * @return GwFormation
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
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

    /**
     * Set nom
     *
     * @param \AppBundle\Entity\GwNomformation $nom
     *
     * @return GwFormation
     */
    public function setNom(\AppBundle\Entity\GwNomformation $nom = null)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return \AppBundle\Entity\GwNomformation
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set assmat
     *
     * @param \AppBundle\Entity\GwAm $assmat
     *
     * @return GwFormation
     */
    public function setAssmat(\AppBundle\Entity\GwAm $assmat = null)
    {
        $this->assmat = $assmat;

        return $this;
    }

    /**
     * Get assmat
     *
     * @return \AppBundle\Entity\GwAm
     */
    public function getAssmat()
    {
        return $this->assmat;
    }
}
