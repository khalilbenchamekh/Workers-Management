<?php

namespace AppBundle\Entity;

/**
 * GwTcactivite
 */
class GwTcactivite
{
    /**
     * @var string
     */
    private $tcactivite;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set tcactivite
     *
     * @param string $tcactivite
     *
     * @return GwTcactivite
     */
    public function setTcactivite($tcactivite)
    {
        $this->tcactivite = $tcactivite;

        return $this;
    }

    /**
     * Get tcactivite
     *
     * @return string
     */
    public function getTcactivite()
    {
        return $this->tcactivite;
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
