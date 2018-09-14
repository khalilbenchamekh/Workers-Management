<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwActivite
 *
 * @ORM\Table(name="gw_activite", indexes={@ORM\Index(name="IDX_7641A86DD0EEB819", columns={"motif_id"}), @ORM\Index(name="IDX_7641A86D3F2BB41C", columns={"assmat_id"})})
 * @ORM\Entity
 */
class GwActivite
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $datefin;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\GwMotifam
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwMotifam")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="motif_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $motif;

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
     * Set datedebut
     *
     * @param \DateTime $datedebut
     *
     * @return GwActivite
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     *
     * @return GwActivite
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
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
     * Set motif
     *
     * @param \AppBundle\Entity\GwMotifam $motif
     *
     * @return GwActivite
     */
    public function setMotif(\AppBundle\Entity\GwMotifam $motif = null)
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get motif
     *
     * @return \AppBundle\Entity\GwMotifam
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * Set assmat
     *
     * @param \AppBundle\Entity\GwAm $assmat
     *
     * @return GwActivite
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
