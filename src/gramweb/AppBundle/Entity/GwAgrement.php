<?php

namespace AppBundle\Entity;

/**
 * GwAgrement
 */
class GwAgrement
{
    /**
     * @var integer
     */
    private $num;

    /**
     * @var \DateTime
     */
    private $datedebut;

    /**
     * @var \DateTime
     */
    private $datefin;

    /**
     * @var boolean
     */
    private $disponible;

    /**
     * @var boolean
     */
    private $disponiblenonrensigne;

    /**
     * @var \DateTime
     */
    private $datelibre;

    /**
     * @var string
     */
    private $details;

    /**
     * @var \DateTime
     */
    private $createdat;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\GwStatutagrement
     */
    private $statut;

    /**
     * @var \AppBundle\Entity\GwDefinitionagrement
     */
    private $definition;

    /**
     * @var \AppBundle\Entity\GwNomagrement
     */
    private $nom;

    /**
     * @var \AppBundle\Entity\GwAm
     */
    private $assmat;


    /**
     * Set num
     *
     * @param integer $num
     *
     * @return GwAgrement
     */
    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }

    /**
     * Get num
     *
     * @return integer
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Set datedebut
     *
     * @param \DateTime $datedebut
     *
     * @return GwAgrement
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     *
     * @return GwAgrement
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * Set disponible
     *
     * @param boolean $disponible
     *
     * @return GwAgrement
     */
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;

        return $this;
    }

    /**
     * Get disponible
     *
     * @return boolean
     */
    public function getDisponible()
    {
        return $this->disponible;
    }

    /**
     * Set disponiblenonrensigne
     *
     * @param boolean $disponiblenonrensigne
     *
     * @return GwAgrement
     */
    public function setDisponiblenonrensigne($disponiblenonrensigne)
    {
        $this->disponiblenonrensigne = $disponiblenonrensigne;

        return $this;
    }

    /**
     * Get disponiblenonrensigne
     *
     * @return boolean
     */
    public function getDisponiblenonrensigne()
    {
        return $this->disponiblenonrensigne;
    }

    /**
     * Set datelibre
     *
     * @param \DateTime $datelibre
     *
     * @return GwAgrement
     */
    public function setDatelibre($datelibre)
    {
        $this->datelibre = $datelibre;

        return $this;
    }

    /**
     * Get datelibre
     *
     * @return \DateTime
     */
    public function getDatelibre()
    {
        return $this->datelibre;
    }

    /**
     * Set details
     *
     * @param string $details
     *
     * @return GwAgrement
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwAgrement
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set statut
     *
     * @param \AppBundle\Entity\GwStatutagrement $statut
     *
     * @return GwAgrement
     */
    public function setStatut(\AppBundle\Entity\GwStatutagrement $statut = null)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return \AppBundle\Entity\GwStatutagrement
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set definition
     *
     * @param \AppBundle\Entity\GwDefinitionagrement $definition
     *
     * @return GwAgrement
     */
    public function setDefinition(\AppBundle\Entity\GwDefinitionagrement $definition = null)
    {
        $this->definition = $definition;

        return $this;
    }

    /**
     * Get definition
     *
     * @return \AppBundle\Entity\GwDefinitionagrement
     */
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     * Set nom
     *
     * @param \AppBundle\Entity\GwNomagrement $nom
     *
     * @return GwAgrement
     */
    public function setNom(\AppBundle\Entity\GwNomagrement $nom = null)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return \AppBundle\Entity\GwNomagrement
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
     * @return GwAgrement
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
