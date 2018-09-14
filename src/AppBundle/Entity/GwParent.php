<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwParent
 *
 * @ORM\Table(name="gw_parent", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_214F38F86834F81E", columns={"responsable1_id"}), @ORM\UniqueConstraint(name="UNIQ_214F38F87A8157F0", columns={"responsable2_id"})}, indexes={@ORM\Index(name="IDX_214F38F8D0EEB819", columns={"motif_id"}), @ORM\Index(name="IDX_214F38F843151866", columns={"configurableFields1_id"}), @ORM\Index(name="IDX_214F38F851A0B788", columns={"configurableFields2_id"}), @ORM\Index(name="IDX_214F38F85B41AD20", columns={"relais_id"}), @ORM\Index(name="IDX_214F38F8A76ED395", columns={"user_id"}), @ORM\Index(name="IDX_214F38F823BC33B1", columns={"statutparent_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GwParentRepository" )
 */
class GwParent
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_saisie", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateSaisie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_demande", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateDemande;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_fiche", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $numFiche;

    /**
     * @var integer
     *
     * @ORM\Column(name="situation_famille", type="smallint", precision=0, scale=0, nullable=true, unique=false)
     */
    private $situationFamille;

    /**
     * @var string
     *
     * @ORM\Column(name="statut_fiche", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $statutFiche;

    /**
     * @var string
     *
     * @ORM\Column(name="zone_appartenance", type="string", length=20, precision=0, scale=0, nullable=true, unique=false)
     */
    private $zoneAppartenance;

    /**
     * @var boolean
     *
     * @ORM\Column(name="archived", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $archived;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $createdat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $updatedat;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sendsms", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $sendsms;

    /**
     * @var boolean
     *
     * @ORM\Column(name="autorphoto", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $autorphoto;

    /**
     * @var boolean
     *
     * @ORM\Column(name="participeanim", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $participeanim;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sendmail", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $sendmail;

    /**
     * @var string
     *
     * @ORM\Column(name="email_envoi", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $emailEnvoi;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_envoi", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $telEnvoi;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_urgence", type="string", length=20, precision=0, scale=0, nullable=true, unique=false)
     */
    private $telUrgence;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $commentaire;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\GwResponsable2
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwResponsable2")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="responsable2_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $responsable2;

    /**
     * @var \AppBundle\Entity\GwUsers
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $user;

    /**
     * @var \AppBundle\Entity\GwMotif
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwMotif")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="motif_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $motif;

    /**
     * @var \AppBundle\Entity\GwResponsable1
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwResponsable1")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="responsable1_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $responsable1;

    /**
     * @var \AppBundle\Entity\GwRelaisContact
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwRelaisContact")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="relais_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $relais;

    /**
     * @var \AppBundle\Entity\GwConfigurablefield1
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwConfigurablefield1")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="configurableFields1_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $configurablefields1;

    /**
     * @var \AppBundle\Entity\GwConfigurablefield2
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwConfigurablefield2")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="configurableFields2_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $configurablefields2;

    /**
     * @var \AppBundle\Entity\GwStatutparent
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwStatutparent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="statutparent_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $statutparent;



    
     /**
     * Set numFiche
     *
     * @param integer $numFiche
     *
     * @return parentUser
     */
    public function setnumFiche($numFiche)
    {
        $this->numFiche = $numFiche;

        return $this;
    }

    /**
     * Get numFiche
     *
     * @return integer
     */
    public function getnumFiche()
    {
        return $this->numFiche;
    }



    /**
     * Set dateSaisie
     *
     * @param \DateTime $dateSaisie
     *
     * @return GwParent
     */
    public function setDateSaisie($dateSaisie)
    {
        $this->dateSaisie = $dateSaisie;

        return $this;
    }

    /**
     * Get dateSaisie
     *
     * @return \DateTime
     */
    public function getDateSaisie()
    {
        return $this->dateSaisie;
    }

    /**
     * Set dateDemande
     *
     * @param \DateTime $dateDemande
     *
     * @return GwParent
     */
    public function setDateDemande($dateDemande)
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }

    /**
     * Get dateDemande
     *
     * @return \DateTime
     */
    public function getDateDemande()
    {
        return $this->dateDemande;
    }

    /**
     * Set situationFamille
     *
     * @param integer $situationFamille
     *
     * @return GwParent
     */
    public function setSituationFamille($situationFamille)
    {
        $this->situationFamille = $situationFamille;

        return $this;
    }

    /**
     * Get situationFamille
     *
     * @return integer
     */
    public function getSituationFamille()
    {
        return $this->situationFamille;
    }

    /**
     * Set statutFiche
     *
     * @param string $statutFiche
     *
     * @return GwParent
     */
    public function setStatutFiche($statutFiche)
    {
        $this->statutFiche = $statutFiche;

        return $this;
    }

    /**
     * Get statutFiche
     *
     * @return string
     */
    public function getStatutFiche()
    {
        return $this->statutFiche;
    }

    /**
     * Set zoneAppartenance
     *
     * @param string $zoneAppartenance
     *
     * @return GwParent
     */
    public function setZoneAppartenance($zoneAppartenance)
    {
        $this->zoneAppartenance = $zoneAppartenance;

        return $this;
    }

    /**
     * Get zoneAppartenance
     *
     * @return string
     */
    public function getZoneAppartenance()
    {
        return $this->zoneAppartenance;
    }

    /**
     * Set archived
     *
     * @param boolean $archived
     *
     * @return GwParent
     */
    public function setArchived($archived)
    {
        $this->archived = $archived;

        return $this;
    }

    /**
     * Get archived
     *
     * @return boolean
     */
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwParent
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
     * @return GwParent
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
     * Set sendsms
     *
     * @param boolean $sendsms
     *
     * @return GwParent
     */
    public function setSendsms($sendsms)
    {
        $this->sendsms = $sendsms;

        return $this;
    }

    /**
     * Get sendsms
     *
     * @return boolean
     */
    public function getSendsms()
    {
        return $this->sendsms;
    }

    /**
     * Set autorphoto
     *
     * @param boolean $autorphoto
     *
     * @return GwParent
     */
    public function setAutorphoto($autorphoto)
    {
        $this->autorphoto = $autorphoto;

        return $this;
    }

    /**
     * Get autorphoto
     *
     * @return boolean
     */
    public function getAutorphoto()
    {
        return $this->autorphoto;
    }

    /**
     * Set participeanim
     *
     * @param boolean $participeanim
     *
     * @return GwParent
     */
    public function setParticipeanim($participeanim)
    {
        $this->participeanim = $participeanim;

        return $this;
    }

    /**
     * Get participeanim
     *
     * @return boolean
     */
    public function getParticipeanim()
    {
        return $this->participeanim;
    }

    /**
     * Set sendmail
     *
     * @param boolean $sendmail
     *
     * @return GwParent
     */
    public function setSendmail($sendmail)
    {
        $this->sendmail = $sendmail;

        return $this;
    }

    /**
     * Get sendmail
     *
     * @return boolean
     */
    public function getSendmail()
    {
        return $this->sendmail;
    }

    /**
     * Set emailEnvoi
     *
     * @param string $emailEnvoi
     *
     * @return GwParent
     */
    public function setEmailEnvoi($emailEnvoi)
    {
        $this->emailEnvoi = $emailEnvoi;

        return $this;
    }

    /**
     * Get emailEnvoi
     *
     * @return string
     */
    public function getEmailEnvoi()
    {
        return $this->emailEnvoi;
    }

    /**
     * Set telEnvoi
     *
     * @param string $telEnvoi
     *
     * @return GwParent
     */
    public function setTelEnvoi($telEnvoi)
    {
        $this->telEnvoi = $telEnvoi;

        return $this;
    }

    /**
     * Get telEnvoi
     *
     * @return string
     */
    public function getTelEnvoi()
    {
        return $this->telEnvoi;
    }

    /**
     * Set telUrgence
     *
     * @param string $telUrgence
     *
     * @return GwParent
     */
    public function setTelUrgence($telUrgence)
    {
        $this->telUrgence = $telUrgence;

        return $this;
    }

    /**
     * Get telUrgence
     *
     * @return string
     */
    public function getTelUrgence()
    {
        return $this->telUrgence;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return GwParent
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
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
     * Set responsable2
     *
     * @param \AppBundle\Entity\GwResponsable2 $responsable2
     *
     * @return GwParent
     */
    public function setResponsable2(\AppBundle\Entity\GwResponsable2 $responsable2 = null)
    {
        $this->responsable2 = $responsable2;

        return $this;
    }

    /**
     * Get responsable2
     *
     * @return \AppBundle\Entity\GwResponsable2
     */
    public function getResponsable2()
    {
        return $this->responsable2;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\GwUsers $user
     *
     * @return GwParent
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

    /**
     * Set motif
     *
     * @param \AppBundle\Entity\GwMotif $motif
     *
     * @return GwParent
     */
    public function setMotif(\AppBundle\Entity\GwMotif $motif = null)
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get motif
     *
     * @return \AppBundle\Entity\GwMotif
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * Set responsable1
     *
     * @param \AppBundle\Entity\GwResponsable1 $responsable1
     *
     * @return GwParent
     */
    public function setResponsable1(\AppBundle\Entity\GwResponsable1 $responsable1 = null)
    {
        $this->responsable1 = $responsable1;

        return $this;
    }

    /**
     * Get responsable1
     *
     * @return \AppBundle\Entity\GwResponsable1
     */
    public function getResponsable1()
    {
        return $this->responsable1;
    }

    /**
     * Set relais
     *
     * @param \AppBundle\Entity\GwRelaisContact $relais
     *
     * @return GwParent
     */
    public function setRelais(\AppBundle\Entity\GwRelaisContact $relais = null)
    {
        $this->relais = $relais;

        return $this;
    }

    /**
     * Get relais
     *
     * @return \AppBundle\Entity\GwRelaisContact
     */
    public function getRelais()
    {
        return $this->relais;
    }

    /**
     * Set configurablefields1
     *
     * @param \AppBundle\Entity\GwConfigurablefield1 $configurablefields1
     *
     * @return GwParent
     */
    public function setConfigurablefields1(\AppBundle\Entity\GwConfigurablefield1 $configurablefields1 = null)
    {
        $this->configurablefields1 = $configurablefields1;

        return $this;
    }

    /**
     * Get configurablefields1
     *
     * @return \AppBundle\Entity\GwConfigurablefield1
     */
    public function getConfigurablefields1()
    {
        return $this->configurablefields1;
    }

    /**
     * Set configurablefields2
     *
     * @param \AppBundle\Entity\GwConfigurablefield2 $configurablefields2
     *
     * @return GwParent
     */
    public function setConfigurablefields2(\AppBundle\Entity\GwConfigurablefield2 $configurablefields2 = null)
    {
        $this->configurablefields2 = $configurablefields2;

        return $this;
    }

    /**
     * Get configurablefields2
     *
     * @return \AppBundle\Entity\GwConfigurablefield2
     */
    public function getConfigurablefields2()
    {
        return $this->configurablefields2;
    }

    /**
     * Set statutparent
     *
     * @param \AppBundle\Entity\GwStatutparent $statutparent
     *
     * @return GwParent
     */
    public function setStatutparent(\AppBundle\Entity\GwStatutparent $statutparent = null)
    {
        $this->statutparent = $statutparent;

        return $this;
    }

    /**
     * Get statutparent
     *
     * @return \AppBundle\Entity\GwStatutparent
     */
    public function getStatutparent()
    {
        return $this->statutparent;
    }
}
