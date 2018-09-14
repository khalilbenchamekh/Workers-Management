<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwSecteur
 *
 * @ORM\Table(name="gw_secteur", indexes={@ORM\Index(name="IDX_D55CC268A73F0036", columns={"ville_id"})})
 * @ORM\Entity
 */
class GwSecteur
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
     * @var \AppBundle\Entity\GwVille
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwVille")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ville_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $ville;



    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return GwSecteur
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
     * @return GwSecteur
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
     * @return GwSecteur
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
     * @return GwSecteur
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
     * Set ville
     *
     * @param \AppBundle\Entity\GwVille $ville
     *
     * @return GwSecteur
     */
    public function setVille(\AppBundle\Entity\GwVille $ville = null)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \AppBundle\Entity\GwVille
     */
    public function getVille()
    {
        return $this->ville;
    }
}
