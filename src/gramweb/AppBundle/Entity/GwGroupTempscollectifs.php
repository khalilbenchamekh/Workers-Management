<?php

namespace AppBundle\Entity;

/**
 * GwGroupTempscollectifs
 */
class GwGroupTempscollectifs
{
    /**
     * @var string
     */
    private $nom;

    /**
     * @var \DateTime
     */
    private $dateCreat;

    /**
     * @var \DateTime
     */
    private $dateModif;

    /**
     * @var string
     */
    private $enfantAssmatReservation;

    /**
     * @var string
     */
    private $partenaireReservation;

    /**
     * @var string
     */
    private $enfantFamilleReservation;

    /**
     * @var string
     */
    private $assmatReservation;

    /**
     * @var string
     */
    private $familleReservation;

    /**
     * @var string
     */
    private $enafntAccueilliReservation;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return GwGroupTempscollectifs
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
     * Set dateCreat
     *
     * @param \DateTime $dateCreat
     *
     * @return GwGroupTempscollectifs
     */
    public function setDateCreat($dateCreat)
    {
        $this->dateCreat = $dateCreat;

        return $this;
    }

    /**
     * Get dateCreat
     *
     * @return \DateTime
     */
    public function getDateCreat()
    {
        return $this->dateCreat;
    }

    /**
     * Set dateModif
     *
     * @param \DateTime $dateModif
     *
     * @return GwGroupTempscollectifs
     */
    public function setDateModif($dateModif)
    {
        $this->dateModif = $dateModif;

        return $this;
    }

    /**
     * Get dateModif
     *
     * @return \DateTime
     */
    public function getDateModif()
    {
        return $this->dateModif;
    }

    /**
     * Set enfantAssmatReservation
     *
     * @param string $enfantAssmatReservation
     *
     * @return GwGroupTempscollectifs
     */
    public function setEnfantAssmatReservation($enfantAssmatReservation)
    {
        $this->enfantAssmatReservation = $enfantAssmatReservation;

        return $this;
    }

    /**
     * Get enfantAssmatReservation
     *
     * @return string
     */
    public function getEnfantAssmatReservation()
    {
        return $this->enfantAssmatReservation;
    }

    /**
     * Set partenaireReservation
     *
     * @param string $partenaireReservation
     *
     * @return GwGroupTempscollectifs
     */
    public function setPartenaireReservation($partenaireReservation)
    {
        $this->partenaireReservation = $partenaireReservation;

        return $this;
    }

    /**
     * Get partenaireReservation
     *
     * @return string
     */
    public function getPartenaireReservation()
    {
        return $this->partenaireReservation;
    }

    /**
     * Set enfantFamilleReservation
     *
     * @param string $enfantFamilleReservation
     *
     * @return GwGroupTempscollectifs
     */
    public function setEnfantFamilleReservation($enfantFamilleReservation)
    {
        $this->enfantFamilleReservation = $enfantFamilleReservation;

        return $this;
    }

    /**
     * Get enfantFamilleReservation
     *
     * @return string
     */
    public function getEnfantFamilleReservation()
    {
        return $this->enfantFamilleReservation;
    }

    /**
     * Set assmatReservation
     *
     * @param string $assmatReservation
     *
     * @return GwGroupTempscollectifs
     */
    public function setAssmatReservation($assmatReservation)
    {
        $this->assmatReservation = $assmatReservation;

        return $this;
    }

    /**
     * Get assmatReservation
     *
     * @return string
     */
    public function getAssmatReservation()
    {
        return $this->assmatReservation;
    }

    /**
     * Set familleReservation
     *
     * @param string $familleReservation
     *
     * @return GwGroupTempscollectifs
     */
    public function setFamilleReservation($familleReservation)
    {
        $this->familleReservation = $familleReservation;

        return $this;
    }

    /**
     * Get familleReservation
     *
     * @return string
     */
    public function getFamilleReservation()
    {
        return $this->familleReservation;
    }

    /**
     * Set enafntAccueilliReservation
     *
     * @param string $enafntAccueilliReservation
     *
     * @return GwGroupTempscollectifs
     */
    public function setEnafntAccueilliReservation($enafntAccueilliReservation)
    {
        $this->enafntAccueilliReservation = $enafntAccueilliReservation;

        return $this;
    }

    /**
     * Get enafntAccueilliReservation
     *
     * @return string
     */
    public function getEnafntAccueilliReservation()
    {
        return $this->enafntAccueilliReservation;
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
