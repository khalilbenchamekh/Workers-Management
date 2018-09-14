<?php

namespace AppBundle\Entity;

/**
 * GwMotCleCoffreContact
 */
class GwMotCleCoffreContact
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $titreMotCle;


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
     * Set titreMotCle
     *
     * @param string $titreMotCle
     *
     * @return GwMotCleCoffreContact
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
}
