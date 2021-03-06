<?php

namespace AppBundle\Entity;

/**
 * GwTcdetailp
 */
class GwTcdetailp
{
    /**
     * @var string
     */
    private $tcdetailp;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set tcdetailp
     *
     * @param string $tcdetailp
     *
     * @return GwTcdetailp
     */
    public function setTcdetailp($tcdetailp)
    {
        $this->tcdetailp = $tcdetailp;

        return $this;
    }

    /**
     * Get tcdetailp
     *
     * @return string
     */
    public function getTcdetailp()
    {
        return $this->tcdetailp;
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
