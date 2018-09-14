<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwTcactivite
 *
 * @ORM\Table(name="gw_tcactivite")
 * @ORM\Entity
 */
class GwTcactivite
{
    /**
     * @var string
     *
     * @ORM\Column(name="tcActivite", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $tcactivite;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set tcactivite
     *
     * @param string $tcactivite
     *
     * @return GwTcactivite
     */
    public function setTcactivite($tcactivite)
    {
        $this->tcactivite = $tcactivite;

        return $this;
    }

    /**
     * Get tcactivite
     *
     * @return string
     */
    public function getTcactivite()
    {
        return $this->tcactivite;
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
