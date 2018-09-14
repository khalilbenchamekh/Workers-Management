<?php

namespace AppBundle\Entity;

/**
 * GwPartenaire
 */
class GwPartenaire
{
    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var integer
     */
    private $civilite;

    /**
     * @var string
     */
    private $adresse;

    /**
     * @var string
     */
    private $tel1;

    /**
     * @var string
     */
    private $tel2;

    /**
     * @var string
     */
    private $fax;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $organisme;

    /**
     * @var string
     */
    private $observation;

    /**
     * @var string
     */
    private $ville;

    /**
     * @var integer
     */
    private $villeId;

    /**
     * @var \DateTime
     */
    private $createdat;

    /**
     * @var \DateTime
     */
    private $updatedat;

    /**
     * @var boolean
     */
    private $sendsms;

    /**
     * @var boolean
     */
    private $sendmail;

    /**
     * @var boolean
     */
    private $archived;

    /**
     * @var boolean
     */
    private $mam;

    /**
     * @var boolean
     */
    private $goelocalise;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\GwProfessionPartenaire
     */
    private $profession;

    /**
     * @var \AppBundle\Entity\GwQuartier
     */
    private $quartier;

    /**
     * @var \AppBundle\Entity\GwUsers
     */
    private $user;

    /**
     * @var \AppBundle\Entity\GwSecteur
     */
    private $secteur;

    /**
     * @var \AppBundle\Entity\GwRelaisContact
     */
    private $relais;


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return GwPartenaire
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return GwPartenaire
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set civilite
     *
     * @param integer $civilite
     *
     * @return GwPartenaire
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Get civilite
     *
     * @return integer
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return GwPartenaire
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set tel1
     *
     * @param string $tel1
     *
     * @return GwPartenaire
     */
    public function setTel1($tel1)
    {
        $this->tel1 = $tel1;

        return $this;
    }

    /**
     * Get tel1
     *
     * @return string
     */
    public function getTel1()
    {
        return $this->tel1;
    }

    /**
     * Set tel2
     *
     * @param string $tel2
     *
     * @return GwPartenaire
     */
    public function setTel2($tel2)
    {
        $this->tel2 = $tel2;

        return $this;
    }

    /**
     * Get tel2
     *
     * @return string
     */
    public function getTel2()
    {
        return $this->tel2;
    }

    /**
     * Set fax
     *
     * @param string $fax
     *
     * @return GwPartenaire
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return GwPartenaire
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set organisme
     *
     * @param string $organisme
     *
     * @return GwPartenaire
     */
    public function setOrganisme($organisme)
    {
        $this->organisme = $organisme;

        return $this;
    }

    /**
     * Get organisme
     *
     * @return string
     */
    public function getOrganisme()
    {
        return $this->organisme;
    }

    /**
     * Set observation
     *
     * @param string $observation
     *
     * @return GwPartenaire
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation
     *
     * @return string
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return GwPartenaire
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set villeId
     *
     * @param integer $villeId
     *
     * @return GwPartenaire
     */
    public function setVilleId($villeId)
    {
        $this->villeId = $villeId;

        return $this;
    }

    /**
     * Get villeId
     *
     * @return integer
     */
    public function getVilleId()
    {
        return $this->villeId;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwPartenaire
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
     * @return GwPartenaire
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
     * @return GwPartenaire
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
     * Set sendmail
     *
     * @param boolean $sendmail
     *
     * @return GwPartenaire
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
     * Set archived
     *
     * @param boolean $archived
     *
     * @return GwPartenaire
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
     * Set mam
     *
     * @param boolean $mam
     *
     * @return GwPartenaire
     */
    public function setMam($mam)
    {
        $this->mam = $mam;

        return $this;
    }

    /**
     * Get mam
     *
     * @return boolean
     */
    public function getMam()
    {
        return $this->mam;
    }

    /**
     * Set goelocalise
     *
     * @param boolean $goelocalise
     *
     * @return GwPartenaire
     */
    public function setGoelocalise($goelocalise)
    {
        $this->goelocalise = $goelocalise;

        return $this;
    }

    /**
     * Get goelocalise
     *
     * @return boolean
     */
    public function getGoelocalise()
    {
        return $this->goelocalise;
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
     * Set profession
     *
     * @param \AppBundle\Entity\GwProfessionPartenaire $profession
     *
     * @return GwPartenaire
     */
    public function setProfession(\AppBundle\Entity\GwProfessionPartenaire $profession = null)
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return \AppBundle\Entity\GwProfessionPartenaire
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * Set quartier
     *
     * @param \AppBundle\Entity\GwQuartier $quartier
     *
     * @return GwPartenaire
     */
    public function setQuartier(\AppBundle\Entity\GwQuartier $quartier = null)
    {
        $this->quartier = $quartier;

        return $this;
    }

    /**
     * Get quartier
     *
     * @return \AppBundle\Entity\GwQuartier
     */
    public function getQuartier()
    {
        return $this->quartier;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\GwUsers $user
     *
     * @return GwPartenaire
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
     * Set secteur
     *
     * @param \AppBundle\Entity\GwSecteur $secteur
     *
     * @return GwPartenaire
     */
    public function setSecteur(\AppBundle\Entity\GwSecteur $secteur = null)
    {
        $this->secteur = $secteur;

        return $this;
    }

    /**
     * Get secteur
     *
     * @return \AppBundle\Entity\GwSecteur
     */
    public function getSecteur()
    {
        return $this->secteur;
    }

    /**
     * Set relais
     *
     * @param \AppBundle\Entity\GwRelaisContact $relais
     *
     * @return GwPartenaire
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
}
