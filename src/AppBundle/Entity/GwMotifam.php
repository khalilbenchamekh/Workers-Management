<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwMotifam
 *
 * @ORM\Table(name="gw_motifam")
 * @ORM\Entity
 */
class GwMotifam
{
    /**
     * @var string
     *
     * @ORM\Column(name="motifsAm", type="string", length=70, precision=0, scale=0, nullable=false, unique=false)
     */
    private $motifsam;

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
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set motifsam
     *
     * @param string $motifsam
     *
     * @return GwMotifam
     */
    public function setMotifsam($motifsam)
    {
        $this->motifsam = $motifsam;

        return $this;
    }

    /**
     * Get motifsam
     *
     * @return string
     */
    public function getMotifsam()
    {
        return $this->motifsam;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwMotifam
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
     * @return GwMotifam
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
