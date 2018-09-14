<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwGroupTempscollectifs
 *
 * @ORM\Table(name="gw_group_tempscollectifs")
 * @ORM\Entity
 */
class GwGroupTempscollectifs
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creat", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateCreat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modif", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateModif;

    /**
     * @var string
     *
     * @ORM\Column(name="enfant_assmat_reservation", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $enfantAssmatReservation;

    /**
     * @var string
     *
     * @ORM\Column(name="partenaire_reservation", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $partenaireReservation;

    /**
     * @var string
     *
     * @ORM\Column(name="enfant_famille_reservation", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $enfantFamilleReservation;

    /**
     * @var string
     *
     * @ORM\Column(name="assmat_reservation", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $assmatReservation;

    /**
     * @var string
     *
     * @ORM\Column(name="famille_reservation", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $familleReservation;

    /**
     * @var string
     *
     * @ORM\Column(name="enafnt_accueilli_reservation", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $enafntAccueilliReservation;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
