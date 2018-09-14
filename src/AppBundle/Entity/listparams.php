<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * listparams
 *
 * @ORM\Table(name="listparams")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\listparamsRepository")
 */
class listparams
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
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="para_colection", type="text", nullable=true)
     */
    private $paraColection;
    /**
     * Many Users have Many Params.
     * @ORM\ManyToMany(targetEntity="Parametre", inversedBy="users")
     * @ORM\JoinTable(name="listes_parametres")
     */
    private $parameters;
    /**
     * @var string
     *
     * @ORM\Column(name="usertype", type="string", length=255, nullable=true)
     */
    private $usertype;
    /**
     * @ORM\OneToMany(targetEntity="user_ra", mappedBy="listparams")
     */
    private $users;

    public function __construct()
    {
        $this->parameters = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }
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
     * @return listparams
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
     * Set paraColection
     *
     * @param string $paraColection
     *
     * @return listparams
     */
    public function setParaColection($paraColection)
    {
        $this->paraColection = $paraColection;

        return $this;
    }

    /**
     * Get paraColection
     *
     * @return string
     */
    public function getParaColection()
    {
        return $this->paraColection;
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
     * Add parameter
     *
     * @param \AppBundle\Entity\Parametre $parameter
     *
     * @return listparams
     */
    public function addParameter(\AppBundle\Entity\Parametre $parameter)
    {
        $this->parameters[] = $parameter;

        return $this;
    }

    /**
     * Remove parameter
     *
     * @param \AppBundle\Entity\Parametre $parameter
     */
    public function removeParameter(\AppBundle\Entity\Parametre $parameter)
    {
        $this->parameters->removeElement($parameter);
    }

    /**
     * Get parameters
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Add user
     *
     * @param \AppBundle\Entity\user_ra $user
     *
     * @return listparams
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
}
