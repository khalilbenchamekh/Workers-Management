<?php

namespace AppBundle\Entity;

/**
 * GwReservationtempscollectifs
 */
class GwReservationtempscollectifs
{
    /**
     * @var integer
     */
    private $typeReservation;

    /**
     * @var \DateTime
     */
    private $dateReservation;

    /**
     * @var integer
     */
    private $typeValidation;

    /**
     * @var string
     */
    private $descriptionReservation;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\GwEnfantacceuil
     */
    private $enafntAccueilliReservation;

    /**
     * @var \AppBundle\Entity\GwUsers
     */
    private $userReservation;

    /**
     * @var \AppBundle\Entity\GwEnfantAssmat
     */
    private $enfantAssmatReservation;

    /**
     * @var \AppBundle\Entity\GwPartenaire
     */
    private $partenaireReservation;

    /**
     * @var \AppBundle\Entity\GwTempsCollectifs
     */
    private $tempsColl;

    /**
     * @var \AppBundle\Entity\GwEnfant
     */
    private $enfantFamilleReservation;

    /**
     * @var \AppBundle\Entity\GwParent
     */
    private $familleReservation;

    /**
     * @var \AppBundle\Entity\GwAm
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
