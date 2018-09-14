<?php

namespace AppBundle\Entity;

/**
 * GwObservatoire
 */
class GwObservatoire
{
    /**
     * @var string
     */
    private $observatoire;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set observatoire
     *
     * @param string $observatoire
     *
     * @return GwObservatoire
     */
    public function setObservatoire($observatoire)
    {
        $this->observatoire = $observatoire;

        return $this;
    }

    /**
     * Get observatoire
     *
     * @return string
     */
    public function getObservatoire()
    {
        return $this->observatoire;
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
