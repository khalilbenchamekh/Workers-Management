<?php

namespace AppBundle\Entity;

/**
 * GwCommunication
 */
class GwCommunication
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $value;

    /**
     * @var integer
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
