<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwFormation
 *
 * @ORM\Table(name="gw_formation", indexes={@ORM\Index(name="IDX_1E50EC4C3F2BB41C", columns={"assmat_id"}), @ORM\Index(name="IDX_1E50EC4CC8121CE9", columns={"nom_id"})})
 * @ORM\Entity
 */
class GwFormation
{
    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="detail", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $detail;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\GwNomformation
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwNomformation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nom_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $nom;

    /**
     * @var \AppBundle\Entity\GwAm
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwAm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="assmat_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $assmat;



    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return GwFormation
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
     * Set detail
     *
     * @param string $detail
     *
     * @return GwFormation
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
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
     * Set nom
     *
     * @param \AppBundle\Entity\GwNomformation $nom
     *
     * @return GwFormation
     */
    public function setNom(\AppBundle\Entity\GwNomformation $nom = null)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return \AppBundle\Entity\GwNomformation
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set assmat
     *
     * @param \AppBundle\Entity\GwAm $assmat
     *
     * @return GwFormation
     */
    public function setAssmat(\AppBundle\Entity\GwAm $assmat = null)
    {
        $this->assmat = $assmat;

        return $this;
    }

    /**
     * Get assmat
     *
     * @return \AppBundle\Entity\GwAm
     */
    public function getAssmat()
    {
        return $this->assmat;
    }
}
