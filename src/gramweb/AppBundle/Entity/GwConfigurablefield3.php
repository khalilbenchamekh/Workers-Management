<?php

namespace AppBundle\Entity;

/**
 * GwConfigurablefield3
 */
class GwConfigurablefield3
{
    /**
     * @var string
     */
    private $titreEntite;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set titreEntite
     *
     * @param string $titreEntite
     *
     * @return GwConfigurablefield3
     */
    public function setTitreEntite($titreEntite)
    {
        $this->titreEntite = $titreEntite;

        return $this;
    }

    /**
     * Get titreEntite
     *
     * @return string
     */
    public function getTitreEntite()
    {
        return $this->titreEntite;
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
