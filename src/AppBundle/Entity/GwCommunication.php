<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwCommunication
 *
 * @ORM\Table(name="gw_communication")
 * @ORM\Entity
 */
class GwCommunication
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $value;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return GwCommunication
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return GwCommunication
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
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
