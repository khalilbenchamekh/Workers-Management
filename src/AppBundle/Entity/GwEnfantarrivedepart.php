<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwEnfantarrivedepart
 *
 * @ORM\Table(name="gw_enfantarrivedepart", indexes={@ORM\Index(name="IDX_F462B17E9C4DD743", columns={"enfantAcceuil_id"}), @ORM\Index(name="IDX_F462B17E3F2BB41C", columns={"assmat_id"}), @ORM\Index(name="IDX_F462B17E450D2529", columns={"enfant_id"})})
 * @ORM\Entity
 */
class GwEnfantarrivedepart
{
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $commentaire;

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
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\GwEnfantacceuil
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwEnfantacceuil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="enfantAcceuil_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $enfantacceuil;

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
     * @var \AppBundle\Entity\GwAm
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwAm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="assmat_id", referencedColumnName="id", nullable=true)
     * })
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
