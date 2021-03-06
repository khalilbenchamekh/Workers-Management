<?php

namespace AppBundle\Entity;

/**
 * GwMotifsupp
 */
class GwMotifsupp
{
    /**
     * @var string
     */
    private $motif;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set motif
     *
     * @param string $motif
     *
     * @return GwMotifsupp
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
