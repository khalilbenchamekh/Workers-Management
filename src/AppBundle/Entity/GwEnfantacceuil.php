<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwEnfantacceuil
 *
 * @ORM\Table(name="gw_enfantacceuil", indexes={@ORM\Index(name="IDX_30F6EAFB450D2529", columns={"enfant_id"}), @ORM\Index(name="IDX_30F6EAFB66BFF398", columns={"agrement_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GwEnfantacceuilRepository" )
 */
class GwEnfantacceuil
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut_acceuil", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateDebutAcceuil;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin_acceuil", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateFinAcceuil;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $commentaire;

    /**
     * @var boolean
     *
     * @ORM\Column(name="agrementDispo", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $agrementdispo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDispo", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $datedispo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $createdat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $updatedat;

    /**
     * @var boolean
     *
     * @ORM\Column(name="depart", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $depart;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\GwAgrement
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwAgrement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="agrement_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $agrement;

    /**
     * @var \AppBundle\Entity\GwEnfant
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwEnfant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="enfant_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $enfant;

    /**
     * Set dateDebutAcceuil
     *
     * @param \DateTime $dateDebutAcceuil
     *
     * @return GwEnfantacceuil
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
     * @return GwEnfantacceuil
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
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return GwEnfantacceuil
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
     * Set agrementdispo
     *
     * @param boolean $agrementdispo
     *
     * @return GwEnfantacceuil
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
     * @return GwEnfantacceuil
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
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwEnfantacceuil
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
     * @return GwEnfantacceuil
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
     * Set depart
     *
     * @param boolean $depart
     *
     * @return GwEnfantacceuil
     */
    public function setDepart($depart)
    {
        $this->depart = $depart;

        return $this;
    }

    /**
     * Get depart
     *
     * @return boolean
     */
    public function getDepart()
    {
        return $this->depart;
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
     * Set agrement
     *
     * @param \AppBundle\Entity\GwAgrement $agrement
     *
     * @return GwEnfantacceuil
     */
    public function setAgrement(\AppBundle\Entity\GwAgrement $agrement = null)
    {
        $this->agrement = $agrement;

        return $this;
    }

    /**
     * Get agrement
     *
     * @return \AppBundle\Entity\GwAgrement
     */
    public function getAgrement()
    {
        return $this->agrement;
    }

    /**
     * Set enfant
     *
     * @param \AppBundle\Entity\GwEnfant $enfant
     *
     * @return GwEnfantacceuil
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
}
