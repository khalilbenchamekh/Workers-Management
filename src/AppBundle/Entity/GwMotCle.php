<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwMotCle
 *
 * @ORM\Table(name="gw_mot_cle")
 * @ORM\Entity
 */
class GwMotCle
{
    /**
     * @var string
     *
     * @ORM\Column(name="titre_mot_cle", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $titreMotCle;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set titreMotCle
     *
     * @param string $titreMotCle
     *
     * @return GwMotCle
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
