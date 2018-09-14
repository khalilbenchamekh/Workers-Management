<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwMotifContact
 *
 * @ORM\Table(name="gw_motif_contact")
 * @ORM\Entity
 */
class GwMotifContact
{
    /**
     * @var string
     *
     * @ORM\Column(name="motif", type="string", length=80, precision=0, scale=0, nullable=false, unique=false)
     */
    private $motif;

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
     * Set motif
     *
     * @param string $motif
     *
     * @return GwMotifContact
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get motif
     *
     * @return string
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwMotifContact
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
     * @return GwMotifContact
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
     * @return GwMotifContact
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
}
