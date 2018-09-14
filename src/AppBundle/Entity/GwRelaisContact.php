<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwRelaisContact
 *
 * @ORM\Table(name="gw_relais_contact")
 * @ORM\Entity
 */
class GwRelaisContact
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=80, precision=0, scale=0, nullable=false, unique=false)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $createdat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $updatedat;

    /**
     * @var boolean
     *
     * @ORM\Column(name="afficher", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $afficher;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\GwUsers", mappedBy="relais")
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set title
     *
     * @param string $title
     *
     * @return GwRelaisContact
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
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwRelaisContact
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;

        return $this;
    }

    /**
     * Get createdat
     *
     * @return \DateTime
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * Set updatedat
     *
     * @param \DateTime $updatedat
     *
     * @return GwRelaisContact
     */
    public function setUpdatedat($updatedat)
    {
        $this->updatedat = $updatedat;

        return $this;
    }

    /**
     * Get updatedat
     *
     * @return \DateTime
     */
    public function getUpdatedat()
    {
        return $this->updatedat;
    }

    /**
     * Set afficher
     *
     * @param boolean $afficher
     *
     * @return GwRelaisContact
     */
    public function setAfficher($afficher)
    {
        $this->afficher = $afficher;

        return $this;
    }

    /**
     * Get afficher
     *
     * @return boolean
     */
    public function getAfficher()
    {
        return $this->afficher;
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

    /**
     * Add user
     *
     * @param \AppBundle\Entity\GwUsers $user
     *
     * @return GwRelaisContact
     */
    public function addUser(\AppBundle\Entity\GwUsers $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\GwUsers $user
     */
    public function removeUser(\AppBundle\Entity\GwUsers $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }
}
