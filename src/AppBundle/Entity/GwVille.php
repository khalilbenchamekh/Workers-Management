<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwVille
 *
 * @ORM\Table(name="gw_ville")
 * @ORM\Entity
 */
class GwVille
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="departement", type="string", length=3, precision=0, scale=0, nullable=true, unique=false)
     */
    private $departement;

    /**
     * @var string
     *
     * @ORM\Column(name="commune", type="string", length=3, precision=0, scale=0, nullable=true, unique=false)
     */
    private $commune;

    /**
     * @var string
     *
     * @ORM\Column(name="code_commune", type="string", length=5, precision=0, scale=0, nullable=true, unique=false)
     */
    private $codeCommune;

    /**
     * @var integer
     *
     * @ORM\Column(name="code_postal", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $codePostal;

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
     * @var boolean
     *
     * @ORM\Column(name="afficher", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $afficher;

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
     * @return GwVille
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
     * Set departement
     *
     * @param string $departement
     *
     * @return GwVille
     */
    public function setDepartement($departement)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return string
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Set commune
     *
     * @param string $commune
     *
     * @return GwVille
     */
    public function setCommune($commune)
    {
        $this->commune = $commune;

        return $this;
    }

    /**
     * Get commune
     *
     * @return string
     */
    public function getCommune()
    {
        return $this->commune;
    }

    /**
     * Set codeCommune
     *
     * @param string $codeCommune
     *
     * @return GwVille
     */
    public function setCodeCommune($codeCommune)
    {
        $this->codeCommune = $codeCommune;

        return $this;
    }

    /**
     * Get codeCommune
     *
     * @return string
     */
    public function getCodeCommune()
    {
        return $this->codeCommune;
    }

    /**
     * Set codePostal
     *
     * @param integer $codePostal
     *
     * @return GwVille
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return integer
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwVille
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
     * @return GwVille
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
     * Set afficher
     *
     * @param boolean $afficher
     *
     * @return GwVille
     */
    public function setAfficher($afficher)
    {
        $this->afficher = $afficher;

        return $this;
    }

    /**
     * Get afficher
     *
     * @return boolean
     */
    public function getAfficher()
    {
        return $this->afficher;
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
