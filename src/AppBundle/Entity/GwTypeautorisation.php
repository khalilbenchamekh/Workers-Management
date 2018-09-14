<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwTypeautorisation
 *
 * @ORM\Table(name="gw_typeautorisation")
 * @ORM\Entity
 */
class GwTypeautorisation
{
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set type
     *
     * @param string $type
     *
     * @return GwTypeautorisation
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
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
