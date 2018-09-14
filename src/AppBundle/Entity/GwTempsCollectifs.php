<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * GwTempsCollectifs
 *
 * @ORM\Table(name="gw_temps_collectifs", indexes={@ORM\Index(name="IDX_B1C5AE5A5CE158E2", columns={"tcActivite_id"}), @ORM\Index(name="IDX_B1C5AE5A82BF4B5E", columns={"tcType_id"}), @ORM\Index(name="IDX_B1C5AE5A5B41AD20", columns={"relais_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GwTempsCollectifsRepository")
 */
class GwTempsCollectifs
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="nb_place", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $nbPlace;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $lieu;

    /**
     * @var boolean
     *
     * @ORM\Column(name="occassionel", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $occassionel;

    /**
     * @var boolean
     *
     * @ORM\Column(name="regulier", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $regulier;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date1", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $date1;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date2", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $date2;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date3", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $date3;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date4", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $date4;

    /**
     * @var string
     *
     * @ORM\Column(name="info", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $info;

    /**
     * @var boolean
     *
     * @ORM\Column(name="valider", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $valider;

    /**
     * @var string
     *
     * @ORM\Column(name="h_deb", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $hDeb;

    /**
     * @var string
     *
     * @ORM\Column(name="h_fin", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $hFin;

    /**
     * @var string
     *
     * @ORM\Column(name="info2", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $info2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_val", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateVal;

    /**
     * @var string
     *
     * @ORM\Column(name="info3", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $info3;

    /**
     * @var string
     *
     * @ORM\Column(name="detailP", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $detailp;

    /**
     * @var string
     *
     * @ORM\Column(name="detailR", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $detailr;

    /**
     * @var string
     *
     * @ORM\Column(name="nb_place_adulte", type="string", length=4, precision=0, scale=0, nullable=true, unique=false)
     */
    private $nbPlaceAdulte;

    /**
     * @var string
     *
     * @ORM\Column(name="nb_place_enfant", type="string", length=4, precision=0, scale=0, nullable=true, unique=false)
     */
    private $nbPlaceEnfant;

    /**
     * @var integer
     */
    private $ancienId;

    /**
     * @var \AppBundle\Entity\GwRelaisContact
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwRelaisContact")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="relais_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $relais;

    /**
     * @var \AppBundle\Entity\GwTcactivite
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwTcactivite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tcActivite_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $tcactivite;

    /**
     * @var \AppBundle\Entity\GwTctype
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwTctype")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tcType_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $tctype;

    /**
     * @var \AppBundle\Entity\GwTclieu
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwTclieu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tCLieu_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $tclieu;


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
     * @param string $nom
     *
     * @return GwTempsCollectifs
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
     * @return GwTempsCollectifs
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
     * @return GwTempsCollectifs
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return GwTempsCollectifs
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
     * Set categorie
     *
     * @param string $categorie
     *
     * @return GwTempsCollectifs
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set nbPlace
     *
     * @param string $nbPlace
     *
     * @return GwTempsCollectifs
     */
    public function setNbPlace($nbPlace)
    {
        $this->nbPlace = $nbPlace;

        return $this;
    }

    /**
     * Get nbPlace
     *
     * @return string
     */
    public function getNbPlace()
    {
        return $this->nbPlace;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return GwTempsCollectifs
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set occassionel
     *
     * @param boolean $occassionel
     *
     * @return GwTempsCollectifs
     */
    public function setOccassionel($occassionel)
    {
        $this->occassionel = $occassionel;

        return $this;
    }

    /**
     * Get occassionel
     *
     * @return boolean
     */
    public function getOccassionel()
    {
        return $this->occassionel;
    }

    /**
     * Set regulier
     *
     * @param boolean $regulier
     *
     * @return GwTempsCollectifs
     */
    public function setRegulier($regulier)
    {
        $this->regulier = $regulier;

        return $this;
    }

    /**
     * Get regulier
     *
     * @return boolean
     */
    public function getRegulier()
    {
        return $this->regulier;
    }

    /**
     * Set date1
     *
     * @param \DateTime $date1
     *
     * @return GwTempsCollectifs
     */
    public function setDate1($date1)
    {
        $this->date1 = $date1;

        return $this;
    }

    /**
     * Get date1
     *
     * @return \DateTime
     */
    public function getDate1()
    {
        return $this->date1;
    }

    /**
     * Set date2
     *
     * @param \DateTime $date2
     *
     * @return GwTempsCollectifs
     */
    public function setDate2($date2)
    {
        $this->date2 = $date2;

        return $this;
    }

    /**
     * Get date2
     *
     * @return \DateTime
     */
    public function getDate2()
    {
        return $this->date2;
    }

    /**
     * Set date3
     *
     * @param \DateTime $date3
     *
     * @return GwTempsCollectifs
     */
    public function setDate3($date3)
    {
        $this->date3 = $date3;

        return $this;
    }

    /**
     * Get date3
     *
     * @return \DateTime
     */
    public function getDate3()
    {
        return $this->date3;
    }

    /**
     * Set date4
     *
     * @param \DateTime $date4
     *
     * @return GwTempsCollectifs
     */
    public function setDate4($date4)
    {
        $this->date4 = $date4;

        return $this;
    }

    /**
     * Get date4
     *
     * @return \DateTime
     */
    public function getDate4()
    {
        return $this->date4;
    }

    /**
     * Set info
     *
     * @param string $info
     *
     * @return GwTempsCollectifs
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set valider
     *
     * @param boolean $valider
     *
     * @return GwTempsCollectifs
     */
    public function setValider($valider)
    {
        $this->valider = $valider;

        return $this;
    }

    /**
     * Get valider
     *
     * @return boolean
     */
    public function getValider()
    {
        return $this->valider;
    }

    /**
     * Set hDeb
     *
     * @param string $hDeb
     *
     * @return GwTempsCollectifs
     */
    public function setHDeb($hDeb)
    {
        $this->hDeb = $hDeb;

        return $this;
    }

    /**
     * Get hDeb
     *
     * @return string
     */
    public function getHDeb()
    {
        return $this->hDeb;
    }

    /**
     * Set hFin
     *
     * @param string $hFin
     *
     * @return GwTempsCollectifs
     */
    public function setHFin($hFin)
    {
        $this->hFin = $hFin;

        return $this;
    }

    /**
     * Get hFin
     *
     * @return string
     */
    public function getHFin()
    {
        return $this->hFin;
    }

    /**
     * Set info2
     *
     * @param string $info2
     *
     * @return GwTempsCollectifs
     */
    public function setInfo2($info2)
    {
        $this->info2 = $info2;

        return $this;
    }

    /**
     * Get info2
     *
     * @return string
     */
    public function getInfo2()
    {
        return $this->info2;
    }

    /**
     * Set dateVal
     *
     * @param \DateTime $dateVal
     *
     * @return GwTempsCollectifs
     */
    public function setDateVal($dateVal)
    {
        $this->dateVal = $dateVal;

        return $this;
    }

    /**
     * Get dateVal
     *
     * @return \DateTime
     */
    public function getDateVal()
    {
        return $this->dateVal;
    }

    /**
     * Set info3
     *
     * @param string $info3
     *
     * @return GwTempsCollectifs
     */
    public function setInfo3($info3)
    {
        $this->info3 = $info3;

        return $this;
    }

    /**
     * Get info3
     *
     * @return string
     */
    public function getInfo3()
    {
        return $this->info3;
    }

    /**
     * Set detailp
     *
     * @param string $detailp
     *
     * @return GwTempsCollectifs
     */
    public function setDetailp($detailp)
    {
        $this->detailp = $detailp;

        return $this;
    }

    /**
     * Get detailp
     *
     * @return string
     */
    public function getDetailp()
    {
        return $this->detailp;
    }

    /**
     * Set detailr
     *
     * @param string $detailr
     *
     * @return GwTempsCollectifs
     */
    public function setDetailr($detailr)
    {
        $this->detailr = $detailr;

        return $this;
    }

    /**
     * Get detailr
     *
     * @return string
     */
    public function getDetailr()
    {
        return $this->detailr;
    }

    /**
     * Set nbPlaceAdulte
     *
     * @param string $nbPlaceAdulte
     *
     * @return GwTempsCollectifs
     */
    public function setNbPlaceAdulte($nbPlaceAdulte)
    {
        $this->nbPlaceAdulte = $nbPlaceAdulte;

        return $this;
    }

    /**
     * Get nbPlaceAdulte
     *
     * @return string
     */
    public function getNbPlaceAdulte()
    {
        return $this->nbPlaceAdulte;
    }

    /**
     * Set nbPlaceEnfant
     *
     * @param string $nbPlaceEnfant
     *
     * @return GwTempsCollectifs
     */
    public function setNbPlaceEnfant($nbPlaceEnfant)
    {
        $this->nbPlaceEnfant = $nbPlaceEnfant;

        return $this;
    }

    /**
     * Get nbPlaceEnfant
     *
     * @return string
     */
    public function getNbPlaceEnfant()
    {
        return $this->nbPlaceEnfant;
    }

    /**
     * Set ancienId
     *
     * @param integer $ancienId
     *
     * @return GwTempsCollectifs
     */
    public function setAncienId($ancienId)
    {
        $this->ancienId = $ancienId;

        return $this;
    }

    /**
     * Get ancienId
     *
     * @return integer
     */
    public function getAncienId()
    {
        return $this->ancienId;
    }

    /**
     * Set relais
     *
     * @param \AppBundle\Entity\GwRelaisContact $relais
     *
     * @return GwTempsCollectifs
     */
    public function setRelais(\AppBundle\Entity\GwRelaisContact $relais = null)
    {
        $this->relais = $relais;

        return $this;
    }

    /**
     * Get relais
     *
     * @return \AppBundle\Entity\GwRelaisContact
     */
    public function getRelais()
    {
        return $this->relais;
    }

    /**
     * Set tcactivite
     *
     * @param \AppBundle\Entity\GwTcactivite $tcactivite
     *
     * @return GwTempsCollectifs
     */
    public function setTcactivite(\AppBundle\Entity\GwTcactivite $tcactivite = null)
    {
        $this->tcactivite = $tcactivite;

        return $this;
    }

    /**
     * Get tcactivite
     *
     * @return \AppBundle\Entity\GwTcactivite
     */
    public function getTcactivite()
    {
        return $this->tcactivite;
    }

    /**
     * Set tctype
     *
     * @param \AppBundle\Entity\GwTctype $tctype
     *
     * @return GwTempsCollectifs
     */
    public function setTctype(\AppBundle\Entity\GwTctype $tctype = null)
    {
        $this->tctype = $tctype;

        return $this;
    }

    /**
     * Get tctype
     *
     * @return \AppBundle\Entity\GwTctype
     */
    public function getTctype()
    {
        return $this->tctype;
    }

    /**
     * Set tclieu
     *
     * @param \AppBundle\Entity\GwTclieu $tclieu
     *
     * @return GwTempsCollectifs
     */
    public function setTclieu(\AppBundle\Entity\GwTclieu $tclieu = null)
    {
        $this->tclieu = $tclieu;

        return $this;
    }

    /**
     * Get tclieu
     *
     * @return \AppBundle\Entity\GwTclieu
     */
    public function getTclieu()
    {
        return $this->tclieu;
    }
}
