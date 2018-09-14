<?php

namespace AppBundle\Entity;

/**
 * GwEnfantarrivedepart
 */
class GwEnfantarrivedepart
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $commentaire;

    /**
     * @var \DateTime
     */
    private $createdat;

    /**
     * @var \DateTime
     */
    private $updatedat;

    /**
     * @var \DateTime
     */
    private $dateDebutAcceuil;

    /**
     * @var \DateTime
     */
    private $dateFinAcceuil;

    /**
     * @var boolean
     */
    private $agrementdispo;

    /**
     * @var \DateTime
     */
    private $datedispo;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\GwEnfantacceuil
     */
    private $enfantacceuil;

    /**
     * @var \AppBundle\Entity\GwEnfant
     */
    private $enfant;

    /**
     * @var \AppBundle\Entity\GwAm
     */
    private $assmat;


    /**
     * Set type
     *
     * @param string $type
     *
     * @return GwEnfantarrivedepart
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return GwEnfantarrivedepart
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
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwEnfantarrivedepart
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
     * @return GwEnfantarrivedepart
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
     * Set dateDebutAcceuil
     *
     * @param \DateTime $dateDebutAcceuil
     *
     * @return GwEnfantarrivedepart
     */
    public function setDateDebutAcceuil($dateDebutAcceuil)
    {
        $this->dateDebutAcceuil = $dateDebutAcceuil;

        return $this;
    }

    /**
     * Get dateDebutAcceuil
     *
     * @return \DateTime
     */
    public function getDateDebutAcceuil()
    {
        return $this->dateDebutAcceuil;
    }

    /**
     * Set dateFinAcceuil
     *
     * @param \DateTime $dateFinAcceuil
     *
     * @return GwEnfantarrivedepart
     */
    public function setDateFinAcceuil($dateFinAcceuil)
    {
        $this->dateFinAcceuil = $dateFinAcceuil;

        return $this;
    }

    /**
     * Get dateFinAcceuil
     *
     * @return \DateTime
     */
    public function getDateFinAcceuil()
    {
        return $this->dateFinAcceuil;
    }

    /**
     * Set agrementdispo
     *
     * @param boolean $agrementdispo
     *
     * @return GwEnfantarrivedepart
     */
    public function setAgrementdispo($agrementdispo)
    {
        $this->agrementdispo = $agrementdispo;

        return $this;
    }

    /**
     * Get agrementdispo
     *
     * @return boolean
     */
    public function getAgrementdispo()
    {
        return $this->agrementdispo;
    }

    /**
     * Set datedispo
     *
     * @param \DateTime $datedispo
     *
     * @return GwEnfantarrivedepart
     */
    public function setDatedispo($datedispo)
    {
        $this->datedispo = $datedispo;

        return $this;
    }

    /**
     * Get datedispo
     *
     * @return \DateTime
     */
    public function getDatedispo()
    {
        return $this->datedispo;
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
     * Set enfantacceuil
     *
     * @param \AppBundle\Entity\GwEnfantacceuil $enfantacceuil
     *
     * @return GwEnfantarrivedepart
     */
    public function setEnfantacceuil(\AppBundle\Entity\GwEnfantacceuil $enfantacceuil = null)
    {
        $this->enfantacceuil = $enfantacceuil;

        return $this;
    }

    /**
     * Get enfantacceuil
     *
     * @return \AppBundle\Entity\GwEnfantacceuil
     */
    public function getEnfantacceuil()
    {
        return $this->enfantacceuil;
    }

    /**
     * Set enfant
     *
     * @param \AppBundle\Entity\GwEnfant $enfant
     *
     * @return GwEnfantarrivedepart
     */
    public function setEnfant(\AppBundle\Entity\GwEnfant $enfant = null)
    {
        $this->enfant = $enfant;

        return $this;
    }

    /**
     * Get enfant
     *
     * @return \AppBundle\Entity\GwEnfant
     */
    public function getEnfant()
    {
        return $this->enfant;
    }

    /**
     * Set assmat
     *
     * @param \AppBundle\Entity\GwAm $assmat
     *
     * @return GwEnfantarrivedepart
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
