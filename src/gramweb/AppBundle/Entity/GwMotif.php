<?php

namespace AppBundle\Entity;

/**
 * GwMotif
 */
class GwMotif
{
    /**
     * @var string
     */
    private $motif;

    /**
     * @var \DateTime
     */
    private $createdat;

    /**
     * @var \DateTime
     */
    private $updatedat;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set motif
     *
     * @param string $motif
     *
     * @return GwMotif
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
     * @return GwMotif
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
     * @return GwMotif
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
