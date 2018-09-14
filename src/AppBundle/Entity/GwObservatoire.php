<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwObservatoire
 *
 * @ORM\Table(name="gw_observatoire")
 * @ORM\Entity
 */
class GwObservatoire
{
    /**
     * @var string
     *
     * @ORM\Column(name="observatoire", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $observatoire;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set observatoire
     *
     * @param string $observatoire
     *
     * @return GwObservatoire
     */
    public function setObservatoire($observatoire)
    {
        $this->observatoire = $observatoire;

        return $this;
    }

    /**
     * Get observatoire
     *
     * @return string
     */
    public function getObservatoire()
    {
        return $this->observatoire;
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
