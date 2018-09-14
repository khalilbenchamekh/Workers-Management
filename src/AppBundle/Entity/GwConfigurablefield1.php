<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwConfigurablefield1
 *
 * @ORM\Table(name="gw_configurablefield1")
 * @ORM\Entity
 */
class GwConfigurablefield1
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
     * @return GwConfigurablefield1
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
