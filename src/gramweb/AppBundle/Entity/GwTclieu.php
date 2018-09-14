<?php

namespace AppBundle\Entity;

/**
 * GwTclieu
 */
class GwTclieu
{
    /**
     * @var string
     */
    private $tclieu;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set tclieu
     *
     * @param string $tclieu
     *
     * @return GwTclieu
     */
    public function setTclieu($tclieu)
    {
        $this->tclieu = $tclieu;

        return $this;
    }

    /**
     * Get tclieu
     *
     * @return string
     */
    public function getTclieu()
    {
        return $this->tclieu;
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
