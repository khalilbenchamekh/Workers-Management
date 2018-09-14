<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwEnfant
 *
 * @ORM\Table(name="gw_enfant", indexes={@ORM\Index(name="IDX_28765415AAB2BC5A", columns={"lieuScolarisation_id"}), @ORM\Index(name="IDX_28765415E9EB8866", columns={"parant_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GwEnfantRepository" )
 */
class GwEnfant
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut_accueil_souhaite", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateDebutAccueilSouhaite;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\GwParent
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwParent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parant_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $parant;

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
     * @return GwEnfant
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
     * @return GwEnfant
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
     * @return GwEnfant
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
     * Set age
     *
     * @param integer $age
     *
     * @return GwEnfant
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
     * @return GwEnfant
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
     * @return GwEnfant
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
     * @return GwEnfant
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
     * Set dateDebutAccueilSouhaite
     *
     * @param \DateTime $dateDebutAccueilSouhaite
     *
     * @return GwEnfant
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set parant
     *
     * @param \AppBundle\Entity\GwParent $parant
     *
     * @return GwEnfant
     */
    public function setParant(\AppBundle\Entity\GwParent $parant = null)
    {
        $this->parant = $parant;

        return $this;
    }

    /**
     * Get parant
     *
     * @return \AppBundle\Entity\GwParent
     */
    public function getParant()
    {
        return $this->parant;
    }

    /**
     * Set lieuscolarisation
     *
     * @param \AppBundle\Entity\GwLieuscolarisation $lieuscolarisation
     *
     * @return GwEnfant
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
