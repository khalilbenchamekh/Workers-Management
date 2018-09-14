<?php

namespace AppBundle\Entity;

/**
 * GwImage
 */
class GwImage
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $alt;

    /**
     * @var string
     */
    private $path;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return GwImage
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
     * Set alt
     *
     * @param string $alt
     *
     * @return GwImage
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return GwImage
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
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
