<?php

namespace AppBundle\Entity;

/**
 * GwTctype
 */
class GwTctype
{
    /**
     * @var string
     */
    private $tctype;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set tctype
     *
     * @param string $tctype
     *
     * @return GwTctype
     */
    public function setTctype($tctype)
    {
        $this->tctype = $tctype;

        return $this;
    }

    /**
     * Get tctype
     *
     * @return string
     */
    public function getTctype()
    {
        return $this->tctype;
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
