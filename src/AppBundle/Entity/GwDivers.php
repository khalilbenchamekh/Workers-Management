<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwDivers
 *
 * @ORM\Table(name="gw_divers")
 * @ORM\Entity
 */
class GwDivers
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="valeur", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $valeur;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
