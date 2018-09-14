<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * GwHistoriqueEmail
 *
 * @ORM\Table(name="gw_historique_email")
 * @ORM\Entity
 */
class GwHistoriqueEmail
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="id_personne", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $idPersonne;

    /**
     * @var string
     *
     * @ORM\Column(name="email_expediteur", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $emailExpediteur;

    /**
     * @var string
     *
     * @ORM\Column(name="email_recepteur", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $emailRecepteur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_envoi", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateEnvoi;

    /**
     * @var string
     * @ORM\Column(name="objet", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $objet;

    /**
     * @var string
     * @ORM\Column(name="message", type="string", length=555, precision=0, scale=0, nullable=true, unique=false)
     */
    private $message;

    /**
     * @var string
     * @ORM\Column(name="type", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $type;

    /**
     * @var boolean
     * @ORM\Column(name="statut", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $statut;

    /**
     * @var \AppBundle\Entity\GwUsers
     *
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\GwUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $user;


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
     * Set idPersonne
     *
     * @param string $idPersonne
     *
     * @return GwHistoriqueEmail
     */
    public function setIdPersonne($idPersonne)
    {
        $this->idPersonne = $idPersonne;

        return $this;
    }

    /**
     * Get idPersonne
     *
     * @return string
     */
    public function getIdPersonne()
    {
        return $this->idPersonne;
    }

    /**
     * Set emailExpediteur
     *
     * @param string $emailExpediteur
     *
     * @return GwHistoriqueEmail
     */
    public function setEmailExpediteur($emailExpediteur)
    {
        $this->emailExpediteur = $emailExpediteur;

        return $this;
    }

    /**
     * Get emailExpediteur
     *
     * @return string
     */
    public function getEmailExpediteur()
    {
        return $this->emailExpediteur;
    }

    /**
     * Set emailRecepteur
     *
     * @param string $emailRecepteur
     *
     * @return GwHistoriqueEmail
     */
    public function setEmailRecepteur($emailRecepteur)
    {
        $this->emailRecepteur = $emailRecepteur;

        return $this;
    }

    /**
     * Get emailRecepteur
     *
     * @return string
     */
    public function getEmailRecepteur()
    {
        return $this->emailRecepteur;
    }

    /**
     * Set dateEnvoi
     *
     * @param \DateTime $dateEnvoi
     *
     * @return GwHistoriqueEmail
     */
    public function setDateEnvoi($dateEnvoi)
    {
        $this->dateEnvoi = $dateEnvoi;

        return $this;
    }

    /**
     * Get dateEnvoi
     *
     * @return \DateTime
     */
    public function getDateEnvoi()
    {
        return $this->dateEnvoi;
    }

    /**
     * Set objet
     *
     * @param string $objet
     *
     * @return GwHistoriqueEmail
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;

        return $this;
    }

    /**
     * Get objet
     *
     * @return string
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return GwHistoriqueEmail
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return GwHistoriqueEmail
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
     * Set statut
     *
     * @param boolean $statut
     *
     * @return GwHistoriqueEmail
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return boolean
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\GwUsers $user
     *
     * @return GwHistoriqueEmail
     */
    public function setUser(\AppBundle\Entity\GwUsers $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\GwUsers
     */
    public function getUser()
    {
        return $this->user;
    }
}
