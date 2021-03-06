<?php

namespace AppBundle\Entity;

/**
 * GwDetailFormation
 */
class GwDetailFormation
{
    /**
     * @var string
     */
    private $titreMotCle;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set titreMotCle
     *
     * @param string $titreMotCle
     *
     * @return GwDetailFormation
     */
    public function setTitreMotCle($titreMotCle)
    {
        $this->titreMotCle = $titreMotCle;

        return $this;
    }

    /**
     * Get titreMotCle
     *
     * @return string
     */
    public function getTitreMotCle()
    {
        return $this->titreMotCle;
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
