<?php

namespace AppBundle\Entity;

/**
 * GwTcnom
 */
class GwTcnom
{
    /**
     * @var string
     */
    private $tcnom;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set tcnom
     *
     * @param string $tcnom
     *
     * @return GwTcnom
     */
    public function setTcnom($tcnom)
    {
        $this->tcnom = $tcnom;

        return $this;
    }

    /**
     * Get tcnom
     *
     * @return string
     */
    public function getTcnom()
    {
        return $this->tcnom;
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
