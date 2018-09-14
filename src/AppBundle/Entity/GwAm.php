<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwAm
 *
 * @ORM\Table(name="gw_am", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_33DDEAEB3DA5256D", columns={"image_id"})}, indexes={@ORM\Index(name="IDX_33DDEAEBDF1E57AB", columns={"quartier_id"}), @ORM\Index(name="IDX_33DDEAEB5B41AD20", columns={"relais_id"}), @ORM\Index(name="IDX_33DDEAEBA73F0036", columns={"ville_id"}), @ORM\Index(name="IDX_33DDEAEBA76ED395", columns={"user_id"}), @ORM\Index(name="IDX_33DDEAEB9F7E4405", columns={"secteur_id"}), @ORM\Index(name="IDX_33DDEAEB5D6B2FF5", columns={"configurableField3_id"}), @ORM\Index(name="IDX_33DDEAEBC0BC174C", columns={"configurableField4_id"}), @ORM\Index(name="IDX_33DDEAEBCA99DE1C", columns={"typeAccueil_id"}), @ORM\Index(name="IDX_33DDEAEB585FB8A5", columns={"motifsSuppression_id"}), @ORM\Index(name="IDX_33DDEAEB98DE13AC", columns={"partenaire_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GwAmRepository" )
 */
class GwAm
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom_naissance", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $nomNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_naissance", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $prenomNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_fixe", type="string", length=20, precision=0, scale=0, nullable=true, unique=false)
     */
    private $telFixe;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_portable", type="string", length=20, precision=0, scale=0, nullable=true, unique=false)
     */
    private $telPortable;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_usage", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $nomUsage;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=6, precision=0, scale=0, nullable=true, unique=false)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="rue1", type="string", length=80, precision=0, scale=0, nullable=true, unique=false)
     */
    private $rue1;

    /**
     * @var string
     *
     * @ORM\Column(name="utilisatrice", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $utilisatrice;

    /**
     * @var string
     *
     * @ORM\Column(name="num_rue", type="string", length=10, precision=0, scale=0, nullable=true, unique=false)
     */
    private $numRue;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_saisie", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateSaisie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_suivi", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateSuivi;

    /**
     * @var string
     *
     * @ORM\Column(name="num_fichie", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $numFichie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="situation_familiale", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $situationFamiliale;

    /**
     * @var integer
     *
     * @ORM\Column(name="civilite", type="smallint", precision=0, scale=0, nullable=true, unique=false)
     */
    private $civilite;

    /**
     * @var string
     *
     * @ORM\Column(name="rue2", type="string", length=80, precision=0, scale=0, nullable=true, unique=false)
     */
    private $rue2;

    /**
     * @var string
     *
     * @ORM\Column(name="rivoli", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $rivoli;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_mail", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $adresseMail;

    /**
     * @var string
     *
     * @ORM\Column(name="mamInf", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $maminf;

    /**
     * @var boolean
     *
     * @ORM\Column(name="mam", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $mam;

    /**
     * @var boolean
     *
     * @ORM\Column(name="dispoNonCommun", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dispononcommun;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_inscription", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateInscription;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_infirmiere", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $nomInfirmiere;

    /**
     * @var boolean
     *
     * @ORM\Column(name="archive", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $archive;

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
     * @ORM\Column(name="ville_relais", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $villeRelais;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_jeune_f", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $nomJeuneF;

    /**
     * @var string
     *
     * @ORM\Column(name="observatoire", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $observatoire;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $commentaire;

    /**
     * @var boolean
     *
     * @ORM\Column(name="question", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $question;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="premierDateAgr", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $premierdateagr;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaireAgr", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $commentaireagr;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lrFixe", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $lrfixe;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lrPortable", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $lrportable;

    /**
     * @var boolean
     *
     * @ORM\Column(name="vehicule", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $vehicule;

    /**
     * @var boolean
     *
     * @ORM\Column(name="animal", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $animal;

    /**
     * @var boolean
     *
     * @ORM\Column(name="regroupement", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $regroupement;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cta", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $cta;

    /**
     * @var boolean
     *
     * @ORM\Column(name="creche_familiale", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $crecheFamiliale;

    /**
     * @var boolean
     *
     * @ORM\Column(name="dispo", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dispo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="inscription_relais", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $inscriptionRelais;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_enfant", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $nbEnfant;

    /**
     * @var boolean
     *
     * @ORM\Column(name="formationAsmat", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $formationasmat;

    /**
     * @var boolean
     *
     * @ORM\Column(name="disponibleNonRensigne", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $disponiblenonrensigne;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ana", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $ana;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_agrement", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $numAgrement;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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
     * @var \AppBundle\Entity\GwConfigurablefield4
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwConfigurablefield4")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="configurableField4_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $configurablefield4;

    /**
     * @var \AppBundle\Entity\GwTypeAcceuil
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwTypeAcceuil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="typeAccueil_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $typeaccueil;

    /**
     * @var \AppBundle\Entity\GwQuartier
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwQuartier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="quartier_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $quartier;

    /**
     * @var \AppBundle\Entity\GwVille
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwVille")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ville_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $ville;

    /**
     * @var \AppBundle\Entity\GwSecteur
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwSecteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="secteur_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $secteur;

    /**
     * @var \AppBundle\Entity\GwMotifsupp
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwMotifsupp")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="motifsSuppression_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $motifssuppression;

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
     * @var \AppBundle\Entity\GwConfigurablefield3
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwConfigurablefield3")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="configurableField3_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $configurablefield3;

    /**
     * @var \AppBundle\Entity\GwPartenaire
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwPartenaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="partenaire_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $partenaire;

    /**
     * @var \AppBundle\Entity\GwImage
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwImage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="image_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $image;



    /**
     * Set nomNaissance
     *
     * @param string $nomNaissance
     *
     * @return GwAm
     */
    public function setNomNaissance($nomNaissance)
    {
        $this->nomNaissance = $nomNaissance;

        return $this;
    }

    /**
     * Get nomNaissance
     *
     * @return string
     */
    public function getNomNaissance()
    {
        return $this->nomNaissance;
    }

    /**
     * Set prenomNaissance
     *
     * @param string $prenomNaissance
     *
     * @return GwAm
     */
    public function setPrenomNaissance($prenomNaissance)
    {
        $this->prenomNaissance = $prenomNaissance;

        return $this;
    }

    /**
     * Get prenomNaissance
     *
     * @return string
     */
    public function getPrenomNaissance()
    {
        return $this->prenomNaissance;
    }

    /**
     * Set telFixe
     *
     * @param string $telFixe
     *
     * @return GwAm
     */
    public function setTelFixe($telFixe)
    {
        $this->telFixe = $telFixe;

        return $this;
    }

    /**
     * Get telFixe
     *
     * @return string
     */
    public function getTelFixe()
    {
        return $this->telFixe;
    }

    /**
     * Set telPortable
     *
     * @param string $telPortable
     *
     * @return GwAm
     */
    public function setTelPortable($telPortable)
    {
        $this->telPortable = $telPortable;

        return $this;
    }

    /**
     * Get telPortable
     *
     * @return string
     */
    public function getTelPortable()
    {
        return $this->telPortable;
    }

    /**
     * Set nomUsage
     *
     * @param string $nomUsage
     *
     * @return GwAm
     */
    public function setNomUsage($nomUsage)
    {
        $this->nomUsage = $nomUsage;

        return $this;
    }

    /**
     * Get nomUsage
     *
     * @return string
     */
    public function getNomUsage()
    {
        return $this->nomUsage;
    }

    /**
     * Set cp
     *
     * @param string $cp
     *
     * @return GwAm
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set rue1
     *
     * @param string $rue1
     *
     * @return GwAm
     */
    public function setRue1($rue1)
    {
        $this->rue1 = $rue1;

        return $this;
    }

    /**
     * Get rue1
     *
     * @return string
     */
    public function getRue1()
    {
        return $this->rue1;
    }

    /**
     * Set utilisatrice
     *
     * @param string $utilisatrice
     *
     * @return GwAm
     */
    public function setUtilisatrice($utilisatrice)
    {
        $this->utilisatrice = $utilisatrice;

        return $this;
    }

    /**
     * Get utilisatrice
     *
     * @return string
     */
    public function getUtilisatrice()
    {
        return $this->utilisatrice;
    }

    /**
     * Set numRue
     *
     * @param string $numRue
     *
     * @return GwAm
     */
    public function setNumRue($numRue)
    {
        $this->numRue = $numRue;

        return $this;
    }

    /**
     * Get numRue
     *
     * @return string
     */
    public function getNumRue()
    {
        return $this->numRue;
    }

    /**
     * Set dateSaisie
     *
     * @param \DateTime $dateSaisie
     *
     * @return GwAm
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
     * Set dateSuivi
     *
     * @param \DateTime $dateSuivi
     *
     * @return GwAm
     */
    public function setDateSuivi($dateSuivi)
    {
        $this->dateSuivi = $dateSuivi;

        return $this;
    }

    /**
     * Get dateSuivi
     *
     * @return \DateTime
     */
    public function getDateSuivi()
    {
        return $this->dateSuivi;
    }

    /**
     * Set numFichie
     *
     * @param string $numFichie
     *
     * @return GwAm
     */
    public function setNumFichie($numFichie)
    {
        $this->numFichie = $numFichie;

        return $this;
    }

    /**
     * Get numFichie
     *
     * @return string
     */
    public function getNumFichie()
    {
        return $this->numFichie;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return GwAm
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set situationFamiliale
     *
     * @param string $situationFamiliale
     *
     * @return GwAm
     */
    public function setSituationFamiliale($situationFamiliale)
    {
        $this->situationFamiliale = $situationFamiliale;

        return $this;
    }

    /**
     * Get situationFamiliale
     *
     * @return string
     */
    public function getSituationFamiliale()
    {
        return $this->situationFamiliale;
    }

    /**
     * Set civilite
     *
     * @param integer $civilite
     *
     * @return GwAm
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
     * Set rue2
     *
     * @param string $rue2
     *
     * @return GwAm
     */
    public function setRue2($rue2)
    {
        $this->rue2 = $rue2;

        return $this;
    }

    /**
     * Get rue2
     *
     * @return string
     */
    public function getRue2()
    {
        return $this->rue2;
    }

    /**
     * Set rivoli
     *
     * @param string $rivoli
     *
     * @return GwAm
     */
    public function setRivoli($rivoli)
    {
        $this->rivoli = $rivoli;

        return $this;
    }

    /**
     * Get rivoli
     *
     * @return string
     */
    public function getRivoli()
    {
        return $this->rivoli;
    }

    /**
     * Set adresseMail
     *
     * @param string $adresseMail
     *
     * @return GwAm
     */
    public function setAdresseMail($adresseMail)
    {
        $this->adresseMail = $adresseMail;

        return $this;
    }

    /**
     * Get adresseMail
     *
     * @return string
     */
    public function getAdresseMail()
    {
        return $this->adresseMail;
    }

    /**
     * Set maminf
     *
     * @param string $maminf
     *
     * @return GwAm
     */
    public function setMaminf($maminf)
    {
        $this->maminf = $maminf;

        return $this;
    }

    /**
     * Get maminf
     *
     * @return string
     */
    public function getMaminf()
    {
        return $this->maminf;
    }

    /**
     * Set mam
     *
     * @param boolean $mam
     *
     * @return GwAm
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
     * Set dispononcommun
     *
     * @param boolean $dispononcommun
     *
     * @return GwAm
     */
    public function setDispononcommun($dispononcommun)
    {
        $this->dispononcommun = $dispononcommun;

        return $this;
    }

    /**
     * Get dispononcommun
     *
     * @return boolean
     */
    public function getDispononcommun()
    {
        return $this->dispononcommun;
    }

    /**
     * Set dateInscription
     *
     * @param \DateTime $dateInscription
     *
     * @return GwAm
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    /**
     * Get dateInscription
     *
     * @return \DateTime
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * Set nomInfirmiere
     *
     * @param string $nomInfirmiere
     *
     * @return GwAm
     */
    public function setNomInfirmiere($nomInfirmiere)
    {
        $this->nomInfirmiere = $nomInfirmiere;

        return $this;
    }

    /**
     * Get nomInfirmiere
     *
     * @return string
     */
    public function getNomInfirmiere()
    {
        return $this->nomInfirmiere;
    }

    /**
     * Set archive
     *
     * @param boolean $archive
     *
     * @return GwAm
     */
    public function setArchive($archive)
    {
        $this->archive = $archive;

        return $this;
    }

    /**
     * Get archive
     *
     * @return boolean
     */
    public function getArchive()
    {
        return $this->archive;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwAm
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
     * @return GwAm
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
     * @return GwAm
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
     * @return GwAm
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
     * @return GwAm
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
     * @return GwAm
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
     * Set villeRelais
     *
     * @param string $villeRelais
     *
     * @return GwAm
     */
    public function setVilleRelais($villeRelais)
    {
        $this->villeRelais = $villeRelais;

        return $this;
    }

    /**
     * Get villeRelais
     *
     * @return string
     */
    public function getVilleRelais()
    {
        return $this->villeRelais;
    }

    /**
     * Set nomJeuneF
     *
     * @param string $nomJeuneF
     *
     * @return GwAm
     */
    public function setNomJeuneF($nomJeuneF)
    {
        $this->nomJeuneF = $nomJeuneF;

        return $this;
    }

    /**
     * Get nomJeuneF
     *
     * @return string
     */
    public function getNomJeuneF()
    {
        return $this->nomJeuneF;
    }

    /**
     * Set observatoire
     *
     * @param string $observatoire
     *
     * @return GwAm
     */
    public function setObservatoire($observatoire)
    {
        $this->observatoire = $observatoire;

        return $this;
    }

    /**
     * Get observatoire
     *
     * @return string
     */
    public function getObservatoire()
    {
        return $this->observatoire;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return GwAm
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
     * Set question
     *
     * @param boolean $question
     *
     * @return GwAm
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return boolean
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set premierdateagr
     *
     * @param \DateTime $premierdateagr
     *
     * @return GwAm
     */
    public function setPremierdateagr($premierdateagr)
    {
        $this->premierdateagr = $premierdateagr;

        return $this;
    }

    /**
     * Get premierdateagr
     *
     * @return \DateTime
     */
    public function getPremierdateagr()
    {
        return $this->premierdateagr;
    }

    /**
     * Set commentaireagr
     *
     * @param string $commentaireagr
     *
     * @return GwAm
     */
    public function setCommentaireagr($commentaireagr)
    {
        $this->commentaireagr = $commentaireagr;

        return $this;
    }

    /**
     * Get commentaireagr
     *
     * @return string
     */
    public function getCommentaireagr()
    {
        return $this->commentaireagr;
    }

    /**
     * Set lrfixe
     *
     * @param boolean $lrfixe
     *
     * @return GwAm
     */
    public function setLrfixe($lrfixe)
    {
        $this->lrfixe = $lrfixe;

        return $this;
    }

    /**
     * Get lrfixe
     *
     * @return boolean
     */
    public function getLrfixe()
    {
        return $this->lrfixe;
    }

    /**
     * Set lrportable
     *
     * @param boolean $lrportable
     *
     * @return GwAm
     */
    public function setLrportable($lrportable)
    {
        $this->lrportable = $lrportable;

        return $this;
    }

    /**
     * Get lrportable
     *
     * @return boolean
     */
    public function getLrportable()
    {
        return $this->lrportable;
    }

    /**
     * Set vehicule
     *
     * @param boolean $vehicule
     *
     * @return GwAm
     */
    public function setVehicule($vehicule)
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    /**
     * Get vehicule
     *
     * @return boolean
     */
    public function getVehicule()
    {
        return $this->vehicule;
    }

    /**
     * Set animal
     *
     * @param boolean $animal
     *
     * @return GwAm
     */
    public function setAnimal($animal)
    {
        $this->animal = $animal;

        return $this;
    }

    /**
     * Get animal
     *
     * @return boolean
     */
    public function getAnimal()
    {
        return $this->animal;
    }

    /**
     * Set regroupement
     *
     * @param boolean $regroupement
     *
     * @return GwAm
     */
    public function setRegroupement($regroupement)
    {
        $this->regroupement = $regroupement;

        return $this;
    }

    /**
     * Get regroupement
     *
     * @return boolean
     */
    public function getRegroupement()
    {
        return $this->regroupement;
    }

    /**
     * Set cta
     *
     * @param boolean $cta
     *
     * @return GwAm
     */
    public function setCta($cta)
    {
        $this->cta = $cta;

        return $this;
    }

    /**
     * Get cta
     *
     * @return boolean
     */
    public function getCta()
    {
        return $this->cta;
    }

    /**
     * Set crecheFamiliale
     *
     * @param boolean $crecheFamiliale
     *
     * @return GwAm
     */
    public function setCrecheFamiliale($crecheFamiliale)
    {
        $this->crecheFamiliale = $crecheFamiliale;

        return $this;
    }

    /**
     * Get crecheFamiliale
     *
     * @return boolean
     */
    public function getCrecheFamiliale()
    {
        return $this->crecheFamiliale;
    }

    /**
     * Set dispo
     *
     * @param boolean $dispo
     *
     * @return GwAm
     */
    public function setDispo($dispo)
    {
        $this->dispo = $dispo;

        return $this;
    }

    /**
     * Get dispo
     *
     * @return boolean
     */
    public function getDispo()
    {
        return $this->dispo;
    }

    /**
     * Set inscriptionRelais
     *
     * @param boolean $inscriptionRelais
     *
     * @return GwAm
     */
    public function setInscriptionRelais($inscriptionRelais)
    {
        $this->inscriptionRelais = $inscriptionRelais;

        return $this;
    }

    /**
     * Get inscriptionRelais
     *
     * @return boolean
     */
    public function getInscriptionRelais()
    {
        return $this->inscriptionRelais;
    }

    /**
     * Set nbEnfant
     *
     * @param integer $nbEnfant
     *
     * @return GwAm
     */
    public function setNbEnfant($nbEnfant)
    {
        $this->nbEnfant = $nbEnfant;

        return $this;
    }

    /**
     * Get nbEnfant
     *
     * @return integer
     */
    public function getNbEnfant()
    {
        return $this->nbEnfant;
    }

    /**
     * Set formationasmat
     *
     * @param boolean $formationasmat
     *
     * @return GwAm
     */
    public function setFormationasmat($formationasmat)
    {
        $this->formationasmat = $formationasmat;

        return $this;
    }

    /**
     * Get formationasmat
     *
     * @return boolean
     */
    public function getFormationasmat()
    {
        return $this->formationasmat;
    }

    /**
     * Set disponiblenonrensigne
     *
     * @param boolean $disponiblenonrensigne
     *
     * @return GwAm
     */
    public function setDisponiblenonrensigne($disponiblenonrensigne)
    {
        $this->disponiblenonrensigne = $disponiblenonrensigne;

        return $this;
    }

    /**
     * Get disponiblenonrensigne
     *
     * @return boolean
     */
    public function getDisponiblenonrensigne()
    {
        return $this->disponiblenonrensigne;
    }

    /**
     * Set ana
     *
     * @param boolean $ana
     *
     * @return GwAm
     */
    public function setAna($ana)
    {
        $this->ana = $ana;

        return $this;
    }

    /**
     * Get ana
     *
     * @return boolean
     */
    public function getAna()
    {
        return $this->ana;
    }

    /**
     * Set numAgrement
     *
     * @param integer $numAgrement
     *
     * @return GwAm
     */
    public function setNumAgrement($numAgrement)
    {
        $this->numAgrement = $numAgrement;

        return $this;
    }

    /**
     * Get numAgrement
     *
     * @return integer
     */
    public function getNumAgrement()
    {
        return $this->numAgrement;
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
     * Set user
     *
     * @param \AppBundle\Entity\GwUsers $user
     *
     * @return GwAm
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
     * Set configurablefield4
     *
     * @param \AppBundle\Entity\GwConfigurablefield4 $configurablefield4
     *
     * @return GwAm
     */
    public function setConfigurablefield4(\AppBundle\Entity\GwConfigurablefield4 $configurablefield4 = null)
    {
        $this->configurablefield4 = $configurablefield4;

        return $this;
    }

    /**
     * Get configurablefield4
     *
     * @return \AppBundle\Entity\GwConfigurablefield4
     */
    public function getConfigurablefield4()
    {
        return $this->configurablefield4;
    }

    /**
     * Set typeaccueil
     *
     * @param \AppBundle\Entity\GwTypeAcceuil $typeaccueil
     *
     * @return GwAm
     */
    public function setTypeaccueil(\AppBundle\Entity\GwTypeAcceuil $typeaccueil = null)
    {
        $this->typeaccueil = $typeaccueil;

        return $this;
    }

    /**
     * Get typeaccueil
     *
     * @return \AppBundle\Entity\GwTypeAcceuil
     */
    public function getTypeaccueil()
    {
        return $this->typeaccueil;
    }

    /**
     * Set quartier
     *
     * @param \AppBundle\Entity\GwQuartier $quartier
     *
     * @return GwAm
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
     * Set ville
     *
     * @param \AppBundle\Entity\GwVille $ville
     *
     * @return GwAm
     */
    public function setVille(\AppBundle\Entity\GwVille $ville = null)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \AppBundle\Entity\GwVille
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set secteur
     *
     * @param \AppBundle\Entity\GwSecteur $secteur
     *
     * @return GwAm
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
     * Set motifssuppression
     *
     * @param \AppBundle\Entity\GwMotifsupp $motifssuppression
     *
     * @return GwAm
     */
    public function setMotifssuppression(\AppBundle\Entity\GwMotifsupp $motifssuppression = null)
    {
        $this->motifssuppression = $motifssuppression;

        return $this;
    }

    /**
     * Get motifssuppression
     *
     * @return \AppBundle\Entity\GwMotifsupp
     */
    public function getMotifssuppression()
    {
        return $this->motifssuppression;
    }

    /**
     * Set relais
     *
     * @param \AppBundle\Entity\GwRelaisContact $relais
     *
     * @return GwAm
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
     * Set configurablefield3
     *
     * @param \AppBundle\Entity\GwConfigurablefield3 $configurablefield3
     *
     * @return GwAm
     */
    public function setConfigurablefield3(\AppBundle\Entity\GwConfigurablefield3 $configurablefield3 = null)
    {
        $this->configurablefield3 = $configurablefield3;

        return $this;
    }

    /**
     * Get configurablefield3
     *
     * @return \AppBundle\Entity\GwConfigurablefield3
     */
    public function getConfigurablefield3()
    {
        return $this->configurablefield3;
    }

    /**
     * Set partenaire
     *
     * @param \AppBundle\Entity\GwPartenaire $partenaire
     *
     * @return GwAm
     */
    public function setPartenaire(\AppBundle\Entity\GwPartenaire $partenaire = null)
    {
        $this->partenaire = $partenaire;

        return $this;
    }

    /**
     * Get partenaire
     *
     * @return \AppBundle\Entity\GwPartenaire
     */
    public function getPartenaire()
    {
        return $this->partenaire;
    }

    /**
     * Set image
     *
     * @param \AppBundle\Entity\GwImage $image
     *
     * @return GwAm
     */
    public function setImage(\AppBundle\Entity\GwImage $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \AppBundle\Entity\GwImage
     */
    public function getImage()
    {
        return $this->image;
    }
}
