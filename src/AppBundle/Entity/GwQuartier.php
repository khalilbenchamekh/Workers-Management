<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwQuartier
 *
 * @ORM\Table(name="gw_quartier", indexes={@ORM\Index(name="IDX_30DC6B559F7E4405", columns={"secteur_id"})})
 * @ORM\Entity
 */
class GwQuartier
{
    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=70, precision=0, scale=0, nullable=false, unique=false)
     */
    private $titre;

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
     * @var \AppBundle\Entity\GwSecteur
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwSecteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="secteur_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $secteur;



    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return GwQuartier
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwQuartier
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
     * @return GwQuartier
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
     * @return GwQuartier
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

    /**
     * Set secteur
     *
     * @param \AppBundle\Entity\GwSecteur $secteur
     *
     * @return GwQuartier
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
