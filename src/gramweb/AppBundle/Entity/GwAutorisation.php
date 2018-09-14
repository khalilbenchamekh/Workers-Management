<?php

namespace AppBundle\Entity;

/**
 * GwAutorisation
 */
class GwAutorisation
{
    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var boolean
     */
    private $statut;

    /**
     * @var string
     */
    private $commentaire;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\GwParent
     */
    private $parent;

    /**
     * @var \AppBundle\Entity\GwTypeautorisation
     */
    private $typeautorisation;

    /**
     * @var \AppBundle\Entity\GwAm
     */
    private $assmat;


    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return GwAutorisation
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set statut
     *
     * @param boolean $statut
     *
     * @return GwAutorisation
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return boolean
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return GwAutorisation
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
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
     * Set parent
     *
     * @param \AppBundle\Entity\GwParent $parent
     *
     * @return GwAutorisation
     */
    public function setParent(\AppBundle\Entity\GwParent $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \AppBundle\Entity\GwParent
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set typeautorisation
     *
     * @param \AppBundle\Entity\GwTypeautorisation $typeautorisation
     *
     * @return GwAutorisation
     */
    public function setTypeautorisation(\AppBundle\Entity\GwTypeautorisation $typeautorisation = null)
    {
        $this->typeautorisation = $typeautorisation;

        return $this;
    }

    /**
     * Get typeautorisation
     *
     * @return \AppBundle\Entity\GwTypeautorisation
     */
    public function getTypeautorisation()
    {
        return $this->typeautorisation;
    }

    /**
     * Set assmat
     *
     * @param \AppBundle\Entity\GwAm $assmat
     *
     * @return GwAutorisation
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
