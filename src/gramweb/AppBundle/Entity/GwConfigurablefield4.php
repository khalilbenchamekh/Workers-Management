<?php

namespace AppBundle\Entity;

/**
 * GwConfigurablefield4
 */
class GwConfigurablefield4
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
     * @return GwConfigurablefield4
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
