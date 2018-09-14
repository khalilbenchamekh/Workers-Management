<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ppf_cofig
 *
 * @ORM\Table(name="ppf_cofig")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ppf_cofigRepository")
 */
class ppf_cofig
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=500, nullable=true)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="commant", type="text", nullable=true)
     */
    private $commant;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return ppf_cofig
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return ppf_cofig
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
     * Set commant
     *
     * @param string $commant
     *
     * @return ppf_cofig
     */
    public function setCommant($commant)
    {
        $this->commant = $commant;

        return $this;
    }

    /**
     * Get commant
     *
     * @return string
     */
    public function getCommant()
    {
        return $this->commant;
    }
}

