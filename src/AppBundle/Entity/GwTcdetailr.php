<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwTcdetailr
 *
 * @ORM\Table(name="gw_tcdetailr")
 * @ORM\Entity
 */
class GwTcdetailr
{
    /**
     * @var string
     *
     * @ORM\Column(name="tcDetailR", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $tcdetailr;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set tcdetailr
     *
     * @param string $tcdetailr
     *
     * @return GwTcdetailr
     */
    public function setTcdetailr($tcdetailr)
    {
        $this->tcdetailr = $tcdetailr;

        return $this;
    }

    /**
     * Get tcdetailr
     *
     * @return string
     */
    public function getTcdetailr()
    {
        return $this->tcdetailr;
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
