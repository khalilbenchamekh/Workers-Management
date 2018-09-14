<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwTcdetailp
 *
 * @ORM\Table(name="gw_tcdetailp")
 * @ORM\Entity
 */
class GwTcdetailp
{
    /**
     * @var string
     *
     * @ORM\Column(name="tcDetailP", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $tcdetailp;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set tcdetailp
     *
     * @param string $tcdetailp
     *
     * @return GwTcdetailp
     */
    public function setTcdetailp($tcdetailp)
    {
        $this->tcdetailp = $tcdetailp;

        return $this;
    }

    /**
     * Get tcdetailp
     *
     * @return string
     */
    public function getTcdetailp()
    {
        return $this->tcdetailp;
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
