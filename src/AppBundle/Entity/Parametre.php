<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParentParametre
 *
 * @ORM\Table(name="parametre")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ParametreRepository")
 */
class Parametre
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
     * @ORM\Column(name="usertype", type="string", length=255, nullable=true)
     */
    private $usertype;

    /**
     * @var string
     *
     * @ORM\Column(name="column_title", type="string", length=255, unique=true)
     */
    private $columnTitle;
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, unique=true)
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="dispaly", type="boolean")
     */
    private $dispaly = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_update", type="boolean")
     */
    private $allowUpdate = false;
    /**
     * @var bool
     *
     * @ORM\Column(name="allow_insert", type="boolean")
     */
    private $allowInsert = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="allow_delete", type="boolean")
     */
    private $allowDelete = false;
    /**
     * Many params have Many Users.
     * @ORM\ManyToMany(targetEntity="user_ra", mappedBy="parameters")
     */
    private $users;
    /**
     * Many params have Many Users.
     * @ORM\ManyToMany(targetEntity="listparams", mappedBy="parameters")
     */
    private $paralist;

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
     * Set usertype
     *
     * @param string $usertype
     *
     * @return listparams
     */
    public function setUsertype($usertype)
    {
        $this->usertype = $usertype;

        return $this;
    }

    /**
     * Get usertype
     *
     * @return string
     */
    public function getUsertype()
    {
        return $this->usertype;
    }
    /**
     * Set columnTitle
     *
     * @param string $columnTitle
     *
     * @return ParentParametre
     */
    public function setColumnTitle($columnTitle)
    {
        $this->columnTitle = $columnTitle;

        return $this;
    }

    /**
     * Get columnTitle
     *
     * @return string
     */
    public function getColumnTitle()
    {
        return $this->columnTitle;
    }
    /**
     * Set description
     *
     * @param string $description
     *
     * @return ParentParametre
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dispaly
     *
     * @param boolean $dispaly
     *
     * @return ParentParametre
     */
    public function setDispaly($dispaly)
    {
        $this->dispaly = $dispaly;

        return $this;
    }

    /**
     * Get dispaly
     *
     * @return bool
     */
    public function getDispaly()
    {
        return $this->dispaly;
    }

    /**
     * Set allowUpdate
     *
     * @param boolean $allowUpdate
     *
     * @return ParentParametre
     */
    public function setAllowUpdate($allowUpdate)
    {
        $this->allowUpdate = $allowUpdate;

        return $this;
    }

    /**
     * Get allowUpdate
     *
     * @return bool
     */
    public function getAllowUpdate()
    {
        return $this->allowUpdate;
    }
    /**
     * Set allowInsert
     *
     * @param boolean $allowInsert
     *
     * @return ParentParametre
     */
    public function setAllowInsert($allowInsert)
    {
        $this->allowInsert = $allowInsert;

        return $this;
    }

    /**
     * Get allowInsert
     *
     * @return bool
     */
    public function getAllowInsert()
    {
        return $this->allowInsert;
    }
    /**
     * Set allowDelete
     *
     * @param boolean $allowDelete
     *
     * @return ParentParametre
     */
    public function setAllowDelete($allowDelete)
    {
        $this->allowDelete = $allowDelete;

        return $this;
    }

    /**
     * Get allowDelete
     *
     * @return bool
     */
    public function getAllowDelete()
    {
        return $this->allowDelete;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->paralist = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \AppBundle\Entity\user_ra $user
     *
     * @return Parametre
     */
    public function addUser(\AppBundle\Entity\user_ra $user)
    {
        $this->users[] = $user;

        return $this;
    }
    /**
     * Remove user
     *
     * @param \AppBundle\Entity\user_ra $user
     */
    public function removeUser(\AppBundle\Entity\user_ra $user)
    {
        $this->users->removeElement($user);
    }
    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }


    /**
     * Add paralist
     *
     * @param \AppBundle\Entity\listparams $paralist
     *
     * @return Parametre
     */
    public function addParalist(\AppBundle\Entity\listparams $paralist)
    {
        $this->paralist[] = $paralist;

        return $this;
    }
    /**
     * Remove paralist
     *
     * @param \AppBundle\Entity\listparams $paralist
     */
    public function removeParalist(\AppBundle\Entity\listparams $paralist)
    {
        $this->paralist->removeElement($paralist);
    }
    /**
     * Get paralist
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParalist()
    {
        return $this->paralist;
    }

}
