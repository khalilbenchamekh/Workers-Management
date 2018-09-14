<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwUsers
 *
 * @ORM\Table(name="gw_users", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_B9BA70B892FC23A8", columns={"username_canonical"}), @ORM\UniqueConstraint(name="UNIQ_B9BA70B8A0D96FBF", columns={"email_canonical"})}, indexes={@ORM\Index(name="IDX_B9BA70B8925F74CB", columns={"relais_default_id"})})
 * @ORM\Entity
 */
class GwUsers
{
    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="username_canonical", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $usernameCanonical;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="email_canonical", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $emailCanonical;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $enabled;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="plainPassword", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $plainpassword;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_login", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $lastLogin;

    /**
     * @var boolean
     *
     * @ORM\Column(name="locked", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $locked;

    /**
     * @var boolean
     *
     * @ORM\Column(name="expired", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $expired;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expires_at", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $expiresAt;

    /**
     * @var string
     *
     * @ORM\Column(name="confirmation_token", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $confirmationToken;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="password_requested_at", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $passwordRequestedAt;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="array", precision=0, scale=0, nullable=false, unique=false)
     */
    private $roles;

    /**
     * @var boolean
     *
     * @ORM\Column(name="credentials_expired", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $credentialsExpired;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="credentials_expire_at", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $credentialsExpireAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cacher", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $cacher;

    /**
     * @var string
     *
     * @ORM\Column(name="signature", type="string", length=1000, precision=0, scale=0, nullable=true, unique=false)
     */
    private $signature;

    /**
     * @var string
     *
     * @ORM\Column(name="notification", type="string", length=256, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notification;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=10, precision=0, scale=0, nullable=true, unique=false)
     */
    private $color;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\GwRelaisContact
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwRelaisContact")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="relais_default_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $relaisDefault;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\GwRelaisContact", inversedBy="user")
     * @ORM\JoinTable(name="gw_user_relais_collection",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="relais_id", referencedColumnName="id", nullable=true)
     *   }
     * )
     */
    private $relais;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->relais = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set username
     *
     * @param string $username
     *
     * @return GwUsers
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set usernameCanonical
     *
     * @param string $usernameCanonical
     *
     * @return GwUsers
     */
    public function setUsernameCanonical($usernameCanonical)
    {
        $this->usernameCanonical = $usernameCanonical;

        return $this;
    }

    /**
     * Get usernameCanonical
     *
     * @return string
     */
    public function getUsernameCanonical()
    {
        return $this->usernameCanonical;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return GwUsers
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set emailCanonical
     *
     * @param string $emailCanonical
     *
     * @return GwUsers
     */
    public function setEmailCanonical($emailCanonical)
    {
        $this->emailCanonical = $emailCanonical;

        return $this;
    }

    /**
     * Get emailCanonical
     *
     * @return string
     */
    public function getEmailCanonical()
    {
        return $this->emailCanonical;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return GwUsers
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return GwUsers
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return GwUsers
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set plainpassword
     *
     * @param string $plainpassword
     *
     * @return GwUsers
     */
    public function setPlainpassword($plainpassword)
    {
        $this->plainpassword = $plainpassword;

        return $this;
    }

    /**
     * Get plainpassword
     *
     * @return string
     */
    public function getPlainpassword()
    {
        return $this->plainpassword;
    }

    /**
     * Set lastLogin
     *
     * @param \DateTime $lastLogin
     *
     * @return GwUsers
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    /**
     * Get lastLogin
     *
     * @return \DateTime
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * Set locked
     *
     * @param boolean $locked
     *
     * @return GwUsers
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;

        return $this;
    }

    /**
     * Get locked
     *
     * @return boolean
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * Set expired
     *
     * @param boolean $expired
     *
     * @return GwUsers
     */
    public function setExpired($expired)
    {
        $this->expired = $expired;

        return $this;
    }

    /**
     * Get expired
     *
     * @return boolean
     */
    public function getExpired()
    {
        return $this->expired;
    }

    /**
     * Set expiresAt
     *
     * @param \DateTime $expiresAt
     *
     * @return GwUsers
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    /**
     * Get expiresAt
     *
     * @return \DateTime
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * Set confirmationToken
     *
     * @param string $confirmationToken
     *
     * @return GwUsers
     */
    public function setConfirmationToken($confirmationToken)
    {
        $this->confirmationToken = $confirmationToken;

        return $this;
    }

    /**
     * Get confirmationToken
     *
     * @return string
     */
    public function getConfirmationToken()
    {
        return $this->confirmationToken;
    }

    /**
     * Set passwordRequestedAt
     *
     * @param \DateTime $passwordRequestedAt
     *
     * @return GwUsers
     */
    public function setPasswordRequestedAt($passwordRequestedAt)
    {
        $this->passwordRequestedAt = $passwordRequestedAt;

        return $this;
    }

    /**
     * Get passwordRequestedAt
     *
     * @return \DateTime
     */
    public function getPasswordRequestedAt()
    {
        return $this->passwordRequestedAt;
    }

    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return GwUsers
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set credentialsExpired
     *
     * @param boolean $credentialsExpired
     *
     * @return GwUsers
     */
    public function setCredentialsExpired($credentialsExpired)
    {
        $this->credentialsExpired = $credentialsExpired;

        return $this;
    }

    /**
     * Get credentialsExpired
     *
     * @return boolean
     */
    public function getCredentialsExpired()
    {
        return $this->credentialsExpired;
    }

    /**
     * Set credentialsExpireAt
     *
     * @param \DateTime $credentialsExpireAt
     *
     * @return GwUsers
     */
    public function setCredentialsExpireAt($credentialsExpireAt)
    {
        $this->credentialsExpireAt = $credentialsExpireAt;

        return $this;
    }

    /**
     * Get credentialsExpireAt
     *
     * @return \DateTime
     */
    public function getCredentialsExpireAt()
    {
        return $this->credentialsExpireAt;
    }

    /**
     * Set cacher
     *
     * @param boolean $cacher
     *
     * @return GwUsers
     */
    public function setCacher($cacher)
    {
        $this->cacher = $cacher;

        return $this;
    }

    /**
     * Get cacher
     *
     * @return boolean
     */
    public function getCacher()
    {
        return $this->cacher;
    }

    /**
     * Set signature
     *
     * @param string $signature
     *
     * @return GwUsers
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * Get signature
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Set notification
     *
     * @param string $notification
     *
     * @return GwUsers
     */
    public function setNotification($notification)
    {
        $this->notification = $notification;

        return $this;
    }

    /**
     * Get notification
     *
     * @return string
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return GwUsers
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
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
     * Set relaisDefault
     *
     * @param \AppBundle\Entity\GwRelaisContact $relaisDefault
     *
     * @return GwUsers
     */
    public function setRelaisDefault(\AppBundle\Entity\GwRelaisContact $relaisDefault = null)
    {
        $this->relaisDefault = $relaisDefault;

        return $this;
    }

    /**
     * Get relaisDefault
     *
     * @return \AppBundle\Entity\GwRelaisContact
     */
    public function getRelaisDefault()
    {
        return $this->relaisDefault;
    }

    /**
     * Add relai
     *
     * @param \AppBundle\Entity\GwRelaisContact $relai
     *
     * @return GwUsers
     */
    public function addRelai(\AppBundle\Entity\GwRelaisContact $relai)
    {
        $this->relais[] = $relai;

        return $this;
    }

    /**
     * Remove relai
     *
     * @param \AppBundle\Entity\GwRelaisContact $relai
     */
    public function removeRelai(\AppBundle\Entity\GwRelaisContact $relai)
    {
        $this->relais->removeElement($relai);
    }

    /**
     * Get relais
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRelais()
    {
        return $this->relais;
    }
}
