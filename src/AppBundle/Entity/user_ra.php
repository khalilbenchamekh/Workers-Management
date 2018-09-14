<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user_ra")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\user_raRepository" )
 */

class user_ra extends BaseUser  
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO" )
     */
    protected $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_gw_id", type="integer" , nullable=true)
     */
    protected $user_gw_id = 0;
    /**
     * @var integer
     *
     * @ORM\Column(name="p_a_pt_id", type="integer" , nullable=true)
     */
    protected $p_a_pt_id = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="usertype", type="string", length=255, nullable=true)
     */
    protected $usertype;

    /**
     * Many Users have Many Params.
     * @ORM\ManyToMany(targetEntity="Parametre", inversedBy="users")
     * @ORM\JoinTable(name="users_parametres")
     */
    private $parameters;

    /**
     * @var string
     *
     * @ORM\Column(name="userkey", type="string", length=255, nullable=true)
     */
    protected $userkey;

    /**
     * @ORM\ManyToOne(targetEntity="listparams", inversedBy="users")
     * @ORM\JoinColumn(name="listparams_id", referencedColumnName="id")
     */
    private $listparams;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_email", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateEmail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_maj", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateMAJ;

    public function __construct()
    {
        parent::__construct();
        $this->parameters = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set usertype
     *
     * @param string $usertype
     *
     * @return parentUser
     */
    public function setusertype($usertype)
    {
        $this->usertype = $usertype;

        return $this;
    }

    /**
     * Get usertype
     *
     * @return string
     */
    public function getusertype()
    {
        return $this->usertype;
    }
    /**
     * Set userkey
     *
     * @param string $userkey
     *
     * @return parentUser
     */
    public function setuserkey($userkey)
    {
        $this->userkey = $userkey;

        return $this;
    }

    /**
     * Get userkey
     *
     * @return string
     */
    public function getuserkey()
    {
        return $this->userkey;
    }

     /**
     * Set user_gw_id
     *
     * @param integer $user_gw_id
     *
     * @return parentUser
     */
    public function setuser_gw_id($user_gw_id)
    {
        $this->user_gw_id = $user_gw_id;

        return $this;
    }

    /**
     * Get user_gw_id
     *
     * @return integer
     */
    public function getuser_gw_id()
    {
        return $this->user_gw_id;
    }
     /**
     * Set p_a_pt_id
     *
     * @param integer $p_a_pt_id
     *
     * @return parentUser
     */
    public function setp_a_pt_id($p_a_pt_id)
    {
        $this->p_a_pt_id = $p_a_pt_id;

        return $this;
    }

    /**
     * Get p_a_pt_id
     *
     * @return integer
     */
    public function getp_a_pt_id()
    {
        return $this->p_a_pt_id;
    }

    /**
     * Set userGwId
     *
     * @param integer $userGwId
     *
     * @return user_ra
     */
    public function setUserGwId($userGwId)
    {
        $this->user_gw_id = $userGwId;

        return $this;
    }

    /**
     * Get userGwId
     *
     * @return integer
     */
    public function getUserGwId()
    {
        return $this->user_gw_id;
    }

    /**
     * Set pAPtId
     *
     * @param integer $pAPtId
     *
     * @return user_ra
     */
    public function setPAPtId($pAPtId)
    {
        $this->p_a_pt_id = $pAPtId;

        return $this;
    }

    /**
     * Get pAPtId
     *
     * @return integer
     */
    public function getPAPtId()
    {
        return $this->p_a_pt_id;
    }

    /**
     * Add parameter
     *
     * @param \AppBundle\Entity\Parametre $parameter
     *
     * @return user_ra
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
     * Set listparams
     *
     * @param \AppBundle\Entity\listparams $listparams
     *
     * @return user_ra
     */
    public function setListparams(\AppBundle\Entity\listparams $listparams = null)
    {
        $this->listparams = $listparams;

        return $this;
    }

    /**
     * Get listparams
     *
     * @return \AppBundle\Entity\listparams
     */
    public function getListparams()
    {
        return $this->listparams;
    }

    /**
     * Set dateEmail
     *
     * @param \DateTime $dateEmail
     *
     * @return user_ra
     */
    public function setDateEmail($dateEmail)
    {
        $this->dateEmail = $dateEmail;

        return $this;
    }

    /**
     * Get dateEmail
     *
     * @return \DateTime
     */
    public function getDateEmail()
    {
        return $this->dateEmail;
    }
    /**
     * Set dateMAJ
     *
     * @param \DateTime $dateMAJ
     *
     * @return user_ra
     */
    public function setDateMAJ($dateMAJ)
    {
        $this->dateMAJ = $dateMAJ;

        return $this;
    }

    /**
     * Get dateMAJ
     *
     * @return \DateTime
     */
    public function getDateMAJ()
    {
        return $this->dateMAJ;
    }
}
