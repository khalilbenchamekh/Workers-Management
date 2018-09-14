<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwStatutagrement
 *
 * @ORM\Table(name="gw_statutagrement")
 * @ORM\Entity
 */
class GwStatutagrement
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nom;

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
     * @return GwStatutagrement
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
