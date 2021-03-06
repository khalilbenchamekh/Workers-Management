<?php

namespace AppBundle\Entity;

/**
 * GwResponsable2
 */
class GwResponsable2
{
    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var integer
     */
    private $civilite;

    /**
     * @var string
     */
    private $cp;

    /**
     * @var integer
     */
    private $numRue;

    /**
     * @var string
     */
    private $rue1;

    /**
     * @var string
     */
    private $rue2;

    /**
     * @var string
     */
    private $rivoli;

    /**
     * @var string
     */
    private $telPerso;

    /**
     * @var string
     */
    private $telPro;

    /**
     * @var string
     */
    private $adresseMail;

    /**
     * @var string
     */
    private $adresseMailPro;

    /**
     * @var string
     */
    private $latitude;

    /**
     * @var string
     */
    private $longitude;

    /**
     * @var string
     */
    private $ville;

    /**
     * @var \DateTime
     */
    private $createdat;

    /**
     * @var \DateTime
     */
    private $updatedat;

    /**
     * @var integer
     */
    private $villeId;

    /**
     * @var string
     */
    private $portable;

    /**
     * @var string
     */
    private $fax;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\GwProfession
     */
    private $profession;

    /**
     * @var \AppBundle\Entity\GwQuartier
     */
    private $quartier;

    /**
     * @var \AppBundle\Entity\GwLieutravail
     */
    private $lieutravail;

    /**
     * @var \AppBundle\Entity\GwSecteur
     */
    private $secteur;


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return GwResponsable2
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return GwResponsable2
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set civilite
     *
     * @param integer $civilite
     *
     * @return GwResponsable2
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Get civilite
     *
     * @return integer
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * Set cp
     *
     * @param string $cp
     *
     * @return GwResponsable2
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set numRue
     *
     * @param integer $numRue
     *
     * @return GwResponsable2
     */
    public function setNumRue($numRue)
    {
        $this->numRue = $numRue;

        return $this;
    }

    /**
     * Get numRue
     *
     * @return integer
     */
    public function getNumRue()
    {
        return $this->numRue;
    }

    /**
     * Set rue1
     *
     * @param string $rue1
     *
     * @return GwResponsable2
     */
    public function setRue1($rue1)
    {
        $this->rue1 = $rue1;

        return $this;
    }

    /**
     * Get rue1
     *
     * @return string
     */
    public function getRue1()
    {
        return $this->rue1;
    }

    /**
     * Set rue2
     *
     * @param string $rue2
     *
     * @return GwResponsable2
     */
    public function setRue2($rue2)
    {
        $this->rue2 = $rue2;

        return $this;
    }

    /**
     * Get rue2
     *
     * @return string
     */
    public function getRue2()
    {
        return $this->rue2;
    }

    /**
     * Set rivoli
     *
     * @param string $rivoli
     *
     * @return GwResponsable2
     */
    public function setRivoli($rivoli)
    {
        $this->rivoli = $rivoli;

        return $this;
    }

    /**
     * Get rivoli
     *
     * @return string
     */
    public function getRivoli()
    {
        return $this->rivoli;
    }

    /**
     * Set telPerso
     *
     * @param string $telPerso
     *
     * @return GwResponsable2
     */
    public function setTelPerso($telPerso)
    {
        $this->telPerso = $telPerso;

        return $this;
    }

    /**
     * Get telPerso
     *
     * @return string
     */
    public function getTelPerso()
    {
        return $this->telPerso;
    }

    /**
     * Set telPro
     *
     * @param string $telPro
     *
     * @return GwResponsable2
     */
    public function setTelPro($telPro)
    {
        $this->telPro = $telPro;

        return $this;
    }

    /**
     * Get telPro
     *
     * @return string
     */
    public function getTelPro()
    {
        return $this->telPro;
    }

    /**
     * Set adresseMail
     *
     * @param string $adresseMail
     *
     * @return GwResponsable2
     */
    public function setAdresseMail($adresseMail)
    {
        $this->adresseMail = $adresseMail;

        return $this;
    }

    /**
     * Get adresseMail
     *
     * @return string
     */
    public function getAdresseMail()
    {
        return $this->adresseMail;
    }

    /**
     * Set adresseMailPro
     *
     * @param string $adresseMailPro
     *
     * @return GwResponsable2
     */
    public function setAdresseMailPro($adresseMailPro)
    {
        $this->adresseMailPro = $adresseMailPro;

        return $this;
    }

    /**
     * Get adresseMailPro
     *
     * @return string
     */
    public function getAdresseMailPro()
    {
        return $this->adresseMailPro;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     *
     * @return GwResponsable2
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return GwResponsable2
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return GwResponsable2
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwResponsable2
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
     * @return GwResponsable2
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
     * Set villeId
     *
     * @param integer $villeId
     *
     * @return GwResponsable2
     */
    public function setVilleId($villeId)
    {
        $this->villeId = $villeId;

        return $this;
    }

    /**
     * Get villeId
     *
     * @return integer
     */
    public function getVilleId()
    {
        return $this->villeId;
    }

    /**
     * Set portable
     *
     * @param string $portable
     *
     * @return GwResponsable2
     */
    public function setPortable($portable)
    {
        $this->portable = $portable;

        return $this;
    }

    /**
     * Get portable
     *
     * @return string
     */
    public function getPortable()
    {
        return $this->portable;
    }

    /**
     * Set fax
     *
     * @param string $fax
     *
     * @return GwResponsable2
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
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
     * Set profession
     *
     * @param \AppBundle\Entity\GwProfession $profession
     *
     * @return GwResponsable2
     */
    public function setProfession(\AppBundle\Entity\GwProfession $profession = null)
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return \AppBundle\Entity\GwProfession
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * Set quartier
     *
     * @param \AppBundle\Entity\GwQuartier $quartier
     *
     * @return GwResponsable2
     */
    public function setQuartier(\AppBundle\Entity\GwQuartier $quartier = null)
    {
        $this->quartier = $quartier;

        return $this;
    }

    /**
     * Get quartier
     *
     * @return \AppBundle\Entity\GwQuartier
     */
    public function getQuartier()
    {
        return $this->quartier;
    }

    /**
     * Set lieutravail
     *
     * @param \AppBundle\Entity\GwLieutravail $lieutravail
     *
     * @return GwResponsable2
     */
    public function setLieutravail(\AppBundle\Entity\GwLieutravail $lieutravail = null)
    {
        $this->lieutravail = $lieutravail;

        return $this;
    }

    /**
     * Get lieutravail
     *
     * @return \AppBundle\Entity\GwLieutravail
     */
    public function getLieutravail()
    {
        return $this->lieutravail;
    }

    /**
     * Set secteur
     *
     * @param \AppBundle\Entity\GwSecteur $secteur
     *
     * @return GwResponsable2
     */
    public function setSecteur(\AppBundle\Entity\GwSecteur $secteur = null)
    {
        $this->secteur = $secteur;

        return $this;
    }

    /**
     * Get secteur
     *
     * @return \AppBundle\Entity\GwSecteur
     */
    public function getSecteur()
    {
        return $this->secteur;
    }
}
