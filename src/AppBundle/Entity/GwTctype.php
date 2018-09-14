<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwTctype
 *
 * @ORM\Table(name="gw_tctype")
 * @ORM\Entity
 */
class GwTctype
{
    /**
     * @var string
     *
     * @ORM\Column(name="tcType", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $tctype;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set tctype
     *
     * @param string $tctype
     *
     * @return GwTctype
     */
    public function setTctype($tctype)
    {
        $this->tctype = $tctype;

        return $this;
    }

    /**
     * Get tctype
     *
     * @return string
     */
    public function getTctype()
    {
        return $this->tctype;
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
