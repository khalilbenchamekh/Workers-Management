<?php

namespace AppBundle\Entity;

/**
 * GwObservatoireAccueil
 */
class GwObservatoireAccueil
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $observatoireAccueil;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set observatoireAccueil
     *
     * @param string $observatoireAccueil
     *
     * @return GwObservatoireAccueil
     */
    public function setObservatoireAccueil($observatoireAccueil)
    {
        $this->observatoireAccueil = $observatoireAccueil;

        return $this;
    }

    /**
     * Get observatoireAccueil
     *
     * @return string
     */
    public function getObservatoireAccueil()
    {
        return $this->observatoireAccueil;
    }
}
