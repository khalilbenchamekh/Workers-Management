<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwConfigurablefield3
 *
 * @ORM\Table(name="gw_configurablefield3")
 * @ORM\Entity
 */
class GwConfigurablefield3
{
    /**
     * @var string
     *
     * @ORM\Column(name="titre_entite", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $titreEntite;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
