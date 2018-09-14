<?php

namespace AppBundle\Entity;

/**
 * GwEnfantAssmat
 */
class GwEnfantAssmat
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
     * @var \DateTime
     */
    private $dateNaissance;

    /**
     * @var \DateTime
     */
    private $dateDebutAccueilSouhaite;

    /**
     * @var integer
     */
    private $age;

    /**
     * @var \DateTime
     */
    private $createdat;

    /**
     * @var \DateTime
     */
    private $updatedat;

    /**
     * @var string
     */
    private $details;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\GwAm
     */
    private $asmat;

    /**
     * @var \AppBundle\Entity\GwLieuscolarisation
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
