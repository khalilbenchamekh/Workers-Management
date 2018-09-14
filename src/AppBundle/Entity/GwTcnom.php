<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwTcnom
 *
 * @ORM\Table(name="gw_tcnom")
 * @ORM\Entity
 */
class GwTcnom
{
    /**
     * @var string
     *
     * @ORM\Column(name="tcNom", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $tcnom;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set tcnom
     *
     * @param string $tcnom
     *
     * @return GwTcnom
     */
    public function setTcnom($tcnom)
    {
        $this->tcnom = $tcnom;

        return $this;
    }

    /**
     * Get tcnom
     *
     * @return string
     */
    public function getTcnom()
    {
        return $this->tcnom;
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
