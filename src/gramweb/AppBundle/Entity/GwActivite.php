<?php

namespace AppBundle\Entity;

/**
 * GwActivite
 */
class GwActivite
{
    /**
     * @var \DateTime
     */
    private $datedebut;

    /**
     * @var \DateTime
     */
    private $datefin;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\GwMotifam
     */
    private $motif;

    /**
     * @var \AppBundle\Entity\GwAm
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
