<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwReservationtempscollectifs
 *
 * @ORM\Table(name="gw_reservationtempscollectifs", indexes={@ORM\Index(name="IDX_A497AF7CEBD380C0", columns={"user_reservation"}), @ORM\Index(name="IDX_A497AF7C7DFB1663", columns={"temps_coll"}), @ORM\Index(name="IDX_A497AF7C1C0D5186", columns={"assmat_reservation"}), @ORM\Index(name="IDX_A497AF7CC6BE4BA6", columns={"partenaire_reservation"}), @ORM\Index(name="IDX_A497AF7C743FF73E", columns={"famille_reservation"}), @ORM\Index(name="IDX_A497AF7CEED6D2B7", columns={"enfant_assmat_reservation"}), @ORM\Index(name="IDX_A497AF7C25132C87", columns={"enfant_famille_reservation"}), @ORM\Index(name="IDX_A497AF7CC6D39574", columns={"enafnt_accueilli_reservation"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GwReservationtempscollectifsRepository"  )
 */
class GwReservationtempscollectifs
{

    /**
     * @var integer
     *
     * @ORM\Column(name="type_reservation", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $typeReservation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_reservation", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dateReservation;

    /**
     * @var integer
     *
     * @ORM\Column(name="type_validation", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $typeValidation;

    /**
     * @var string
     *
     * @ORM\Column(name="description_reservation", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $descriptionReservation;

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
     *   @ORM\JoinColumn(name="enafnt_accueilli_reservation", referencedColumnName="id", nullable=true)
     * })
     */
    private $enafntAccueilliReservation;

    /**
     * @var \AppBundle\Entity\GwUsers
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_reservation", referencedColumnName="id", nullable=true)
     * })
     */
    private $userReservation;

    /**
     * @var \AppBundle\Entity\GwEnfantAssmat
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwEnfantAssmat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="enfant_assmat_reservation", referencedColumnName="id", nullable=true)
     * })
     */
    private $enfantAssmatReservation;

    /**
     * @var \AppBundle\Entity\GwPartenaire
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwPartenaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="partenaire_reservation", referencedColumnName="id", nullable=true)
     * })
     */
    private $partenaireReservation;

    /**
     * @var \AppBundle\Entity\GwTempsCollectifs
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwTempsCollectifs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="temps_coll", referencedColumnName="id", nullable=true)
     * })
     */
    private $tempsColl;

    /**
     * @var \AppBundle\Entity\GwEnfant
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwEnfant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="enfant_famille_reservation", referencedColumnName="id", nullable=true)
     * })
     */
    private $enfantFamilleReservation;

    /**
     * @var \AppBundle\Entity\GwParent
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwParent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="famille_reservation", referencedColumnName="id", nullable=true)
     * })
     */
    private $familleReservation;

    /**
     * @var \AppBundle\Entity\GwAm
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwAm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="assmat_reservation", referencedColumnName="id", nullable=true)
     * })
     */
    private $assmatReservation;



    /**
     * Set typeReservation
     *
     * @param integer $typeReservation
     *
     * @return GwReservationtempscollectifs
     */
    public function setTypeReservation($typeReservation)
    {
        $this->typeReservation = $typeReservation;

        return $this;
    }

    /**
     * Get typeReservation
     *
     * @return integer
     */
    public function getTypeReservation()
    {
        return $this->typeReservation;
    }

    /**
     * Set dateReservation
     *
     * @param \DateTime $dateReservation
     *
     * @return GwReservationtempscollectifs
     */
    public function setDateReservation($dateReservation)
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    /**
     * Get dateReservation
     *
     * @return \DateTime
     */
    public function getDateReservation()
    {
        return $this->dateReservation;
    }

    /**
     * Set typeValidation
     *
     * @param integer $typeValidation
     *
     * @return GwReservationtempscollectifs
     */
    public function setTypeValidation($typeValidation)
    {
        $this->typeValidation = $typeValidation;

        return $this;
    }

    /**
     * Get typeValidation
     *
     * @return integer
     */
    public function getTypeValidation()
    {
        return $this->typeValidation;
    }

    /**
     * Set descriptionReservation
     *
     * @param string $descriptionReservation
     *
     * @return GwReservationtempscollectifs
     */
    public function setDescriptionReservation($descriptionReservation)
    {
        $this->descriptionReservation = $descriptionReservation;

        return $this;
    }

    /**
     * Get descriptionReservation
     *
     * @return string
     */
    public function getDescriptionReservation()
    {
        return $this->descriptionReservation;
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
     * Set enafntAccueilliReservation
     *
     * @param \AppBundle\Entity\GwEnfantacceuil $enafntAccueilliReservation
     *
     * @return GwReservationtempscollectifs
     */
    public function setEnafntAccueilliReservation(\AppBundle\Entity\GwEnfantacceuil $enafntAccueilliReservation = null)
    {
        $this->enafntAccueilliReservation = $enafntAccueilliReservation;

        return $this;
    }

    /**
     * Get enafntAccueilliReservation
     *
     * @return \AppBundle\Entity\GwEnfantacceuil
     */
    public function getEnafntAccueilliReservation()
    {
        return $this->enafntAccueilliReservation;
    }

    /**
     * Set userReservation
     *
     * @param \AppBundle\Entity\GwUsers $userReservation
     *
     * @return GwReservationtempscollectifs
     */
    public function setUserReservation(\AppBundle\Entity\GwUsers $userReservation = null)
    {
        $this->userReservation = $userReservation;

        return $this;
    }

    /**
     * Get userReservation
     *
     * @return \AppBundle\Entity\GwUsers
     */
    public function getUserReservation()
    {
        return $this->userReservation;
    }

    /**
     * Set enfantAssmatReservation
     *
     * @param \AppBundle\Entity\GwEnfantAssmat $enfantAssmatReservation
     *
     * @return GwReservationtempscollectifs
     */
    public function setEnfantAssmatReservation(\AppBundle\Entity\GwEnfantAssmat $enfantAssmatReservation = null)
    {
        $this->enfantAssmatReservation = $enfantAssmatReservation;

        return $this;
    }

    /**
     * Get enfantAssmatReservation
     *
     * @return \AppBundle\Entity\GwEnfantAssmat
     */
    public function getEnfantAssmatReservation()
    {
        return $this->enfantAssmatReservation;
    }

    /**
     * Set partenaireReservation
     *
     * @param \AppBundle\Entity\GwPartenaire $partenaireReservation
     *
     * @return GwReservationtempscollectifs
     */
    public function setPartenaireReservation(\AppBundle\Entity\GwPartenaire $partenaireReservation = null)
    {
        $this->partenaireReservation = $partenaireReservation;

        return $this;
    }

    /**
     * Get partenaireReservation
     *
     * @return \AppBundle\Entity\GwPartenaire
     */
    public function getPartenaireReservation()
    {
        return $this->partenaireReservation;
    }

    /**
     * Set tempsColl
     *
     * @param \AppBundle\Entity\GwTempsCollectifs $tempsColl
     *
     * @return GwReservationtempscollectifs
     */
    public function setTempsColl(\AppBundle\Entity\GwTempsCollectifs $tempsColl = null)
    {
        $this->tempsColl = $tempsColl;

        return $this;
    }

    /**
     * Get tempsColl
     *
     * @return \AppBundle\Entity\GwTempsCollectifs
     */
    public function getTempsColl()
    {
        return $this->tempsColl;
    }

    /**
     * Set enfantFamilleReservation
     *
     * @param \AppBundle\Entity\GwEnfant $enfantFamilleReservation
     *
     * @return GwReservationtempscollectifs
     */
    public function setEnfantFamilleReservation(\AppBundle\Entity\GwEnfant $enfantFamilleReservation = null)
    {
        $this->enfantFamilleReservation = $enfantFamilleReservation;

        return $this;
    }

    /**
     * Get enfantFamilleReservation
     *
     * @return \AppBundle\Entity\GwEnfant
     */
    public function getEnfantFamilleReservation()
    {
        return $this->enfantFamilleReservation;
    }

    /**
     * Set familleReservation
     *
     * @param \AppBundle\Entity\GwParent $familleReservation
     *
     * @return GwReservationtempscollectifs
     */
    public function setFamilleReservation(\AppBundle\Entity\GwParent $familleReservation = null)
    {
        $this->familleReservation = $familleReservation;

        return $this;
    }

    /**
     * Get familleReservation
     *
     * @return \AppBundle\Entity\GwParent
     */
    public function getFamilleReservation()
    {
        return $this->familleReservation;
    }

    /**
     * Set assmatReservation
     *
     * @param \AppBundle\Entity\GwAm $assmatReservation
     *
     * @return GwReservationtempscollectifs
     */
    public function setAssmatReservation(\AppBundle\Entity\GwAm $assmatReservation = null)
    {
        $this->assmatReservation = $assmatReservation;

        return $this;
    }

    /**
     * Get assmatReservation
     *
     * @return \AppBundle\Entity\GwAm
     */
    public function getAssmatReservation()
    {
        return $this->assmatReservation;
    }
}
