<?php

namespace AppBundle\Entity;

/**
 * GwEnfant
 */
class GwEnfant
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
     * @var \DateTime
     */
    private $dateDebutAccueilSouhaite;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\GwParent
     */
    private $parant;

    /**
     * @var \AppBundle\Entity\GwLieuscolarisation
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
