<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwRenseignementContact
 *
 * @ORM\Table(name="gw_renseignement_contact", indexes={@ORM\Index(name="IDX_D74FF5428F0B5DCB", columns={"motifContact_id"})})
 * @ORM\Entity
 */
class GwRenseignementContact
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=80, precision=0, scale=0, nullable=false, unique=false)
     */
    private $title;

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
     * @ORM\Column(name="cacher", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $cacher;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\GwMotifContact
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwMotifContact")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="motifContact_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $motifcontact;



    /**
     * Set title
     *
     * @param string $title
     *
     * @return GwRenseignementContact
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwRenseignementContact
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
     * @return GwRenseignementContact
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
     * Set cacher
     *
     * @param boolean $cacher
     *
     * @return GwRenseignementContact
     */
    public function setCacher($cacher)
    {
        $this->cacher = $cacher;

        return $this;
    }

    /**
     * Get cacher
     *
     * @return boolean
     */
    public function getCacher()
    {
        return $this->cacher;
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
     * Set motifcontact
     *
     * @param \AppBundle\Entity\GwMotifContact $motifcontact
     *
     * @return GwRenseignementContact
     */
    public function setMotifcontact(\AppBundle\Entity\GwMotifContact $motifcontact = null)
    {
        $this->motifcontact = $motifcontact;

        return $this;
    }

    /**
     * Get motifcontact
     *
     * @return \AppBundle\Entity\GwMotifContact
     */
    public function getMotifcontact()
    {
        return $this->motifcontact;
    }
}
