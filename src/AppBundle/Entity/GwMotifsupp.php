<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwMotifsupp
 *
 * @ORM\Table(name="gw_motifsupp")
 * @ORM\Entity
 */
class GwMotifsupp
{
    /**
     * @var string
     *
     * @ORM\Column(name="motif", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $motif;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set motif
     *
     * @param string $motif
     *
     * @return GwMotifsupp
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get motif
     *
     * @return string
     */
    public function getMotif()
    {
        return $this->motif;
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
