<?php

namespace AppBundle\Entity;

/**
 * GwTcdetailr
 */
class GwTcdetailr
{
    /**
     * @var string
     */
    private $tcdetailr;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set tcdetailr
     *
     * @param string $tcdetailr
     *
     * @return GwTcdetailr
     */
    public function setTcdetailr($tcdetailr)
    {
        $this->tcdetailr = $tcdetailr;

        return $this;
    }

    /**
     * Get tcdetailr
     *
     * @return string
     */
    public function getTcdetailr()
    {
        return $this->tcdetailr;
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
