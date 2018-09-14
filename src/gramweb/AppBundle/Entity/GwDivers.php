<?php

namespace AppBundle\Entity;

/**
 * GwDivers
 */
class GwDivers
{
    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $valeur;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return GwDivers
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
     * Set valeur
     *
     * @param string $valeur
     *
     * @return GwDivers
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return string
     */
    public function getValeur()
    {
        return $this->valeur;
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
