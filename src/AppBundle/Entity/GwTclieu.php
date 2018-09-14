<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwTclieu
 *
 * @ORM\Table(name="gw_tclieu")
 * @ORM\Entity
 */
class GwTclieu
{
    /**
     * @var string
     *
     * @ORM\Column(name="tcLieu", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $tclieu;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Set tclieu
     *
     * @param string $tclieu
     *
     * @return GwTclieu
     */
    public function setTclieu($tclieu)
    {
        $this->tclieu = $tclieu;

        return $this;
    }

    /**
     * Get tclieu
     *
     * @return string
     */
    public function getTclieu()
    {
        return $this->tclieu;
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
