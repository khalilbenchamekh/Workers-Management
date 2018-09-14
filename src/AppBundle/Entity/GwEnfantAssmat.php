<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwEnfantAssmat
 *
 * @ORM\Table(name="gw_enfant_assmat", indexes={@ORM\Index(name="IDX_96CDD334AAB2BC5A", columns={"lieuScolarisation_id"}), @ORM\Index(name="IDX_96CDD334C986DC6A", columns={"asmat_id"})})
 * @ORM\Entity
 */
class GwEnfantAssmat
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=70, precision=0, scale=0, nullable=true, unique=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=70, precision=0, scale=0, nullable=true, unique=false)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateNaissance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut_accueil_souhaite", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateDebutAccueilSouhaite;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $age;

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
     * @var string
     *
     * @ORM\Column(name="details", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $details;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\GwAm
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwAm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="asmat_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $asmat;

    /**
     * @var \AppBundle\Entity\GwLieuscolarisation
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwLieuscolarisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lieuScolarisation_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $lieuscolarisation;



    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return GwEnfantAssmat
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
     * @return GwEnfantAssmat
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
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return GwEnfantAssmat
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set dateDebutAccueilSouhaite
     *
     * @param \DateTime $dateDebutAccueilSouhaite
     *
     * @return GwEnfantAssmat
     */
    public function setDateDebutAccueilSouhaite($dateDebutAccueilSouhaite)
    {
        $this->dateDebutAccueilSouhaite = $dateDebutAccueilSouhaite;

        return $this;
    }

    /**
     * Get dateDebutAccueilSouhaite
     *
     * @return \DateTime
     */
    public function getDateDebutAccueilSouhaite()
    {
        return $this->dateDebutAccueilSouhaite;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return GwEnfantAssmat
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwEnfantAssmat
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
     * @return GwEnfantAssmat
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
     * Set details
     *
     * @param string $details
     *
     * @return GwEnfantAssmat
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
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
     * Set asmat
     *
     * @param \AppBundle\Entity\GwAm $asmat
     *
     * @return GwEnfantAssmat
     */
    public function setAsmat(\AppBundle\Entity\GwAm $asmat = null)
    {
        $this->asmat = $asmat;

        return $this;
    }

    /**
     * Get asmat
     *
     * @return \AppBundle\Entity\GwAm
     */
    public function getAsmat()
    {
        return $this->asmat;
    }

    /**
     * Set lieuscolarisation
     *
     * @param \AppBundle\Entity\GwLieuscolarisation $lieuscolarisation
     *
     * @return GwEnfantAssmat
     */
    public function setLieuscolarisation(\AppBundle\Entity\GwLieuscolarisation $lieuscolarisation = null)
    {
        $this->lieuscolarisation = $lieuscolarisation;

        return $this;
    }

    /**
     * Get lieuscolarisation
     *
     * @return \AppBundle\Entity\GwLieuscolarisation
     */
    public function getLieuscolarisation()
    {
        return $this->lieuscolarisation;
    }
}
