<?php

namespace AppBundle\Entity;

/**
 * GwNomformation
 */
class GwNomformation
{
    /**
     * @var string
     */
    private $nom;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return GwNomformation
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
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
