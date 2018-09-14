<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwAutorisation
 *
 * @ORM\Table(name="gw_autorisation", indexes={@ORM\Index(name="IDX_DDC5458450BAA2B3", columns={"typeAutorisation_id"}), @ORM\Index(name="IDX_DDC545843F2BB41C", columns={"assmat_id"}), @ORM\Index(name="IDX_DDC54584727ACA70", columns={"parent_id"})})
 * @ORM\Entity
 */
class GwAutorisation
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $date;

    /**
     * @var boolean
     *
     * @ORM\Column(name="statut", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $statut;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $commentaire;

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
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $parent;

    /**
     * @var \AppBundle\Entity\GwTypeautorisation
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwTypeautorisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="typeAutorisation_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $typeautorisation;

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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return GwAutorisation
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set statut
     *
     * @param boolean $statut
     *
     * @return GwAutorisation
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return boolean
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return GwAutorisation
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
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
     * Set parent
     *
     * @param \AppBundle\Entity\GwParent $parent
     *
     * @return GwAutorisation
     */
    public function setParent(\AppBundle\Entity\GwParent $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \AppBundle\Entity\GwParent
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set typeautorisation
     *
     * @param \AppBundle\Entity\GwTypeautorisation $typeautorisation
     *
     * @return GwAutorisation
     */
    public function setTypeautorisation(\AppBundle\Entity\GwTypeautorisation $typeautorisation = null)
    {
        $this->typeautorisation = $typeautorisation;

        return $this;
    }

    /**
     * Get typeautorisation
     *
     * @return \AppBundle\Entity\GwTypeautorisation
     */
    public function getTypeautorisation()
    {
        return $this->typeautorisation;
    }

    /**
     * Set assmat
     *
     * @param \AppBundle\Entity\GwAm $assmat
     *
     * @return GwAutorisation
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
