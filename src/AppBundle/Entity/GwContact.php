<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwContact
 *
 * @ORM\Table(name="gw_contact", indexes={@ORM\Index(name="IDX_197B014FA73F0036", columns={"ville_id"}), @ORM\Index(name="IDX_197B014FC54C8C93", columns={"type_id"}), @ORM\Index(name="IDX_197B014FD0EEB819", columns={"motif_id"}), @ORM\Index(name="IDX_197B014FC842E5E8", columns={"renseignement_id"}), @ORM\Index(name="IDX_197B014F6C346E29", columns={"moyen_id"}), @ORM\Index(name="IDX_197B014F4034998F", columns={"occasion_id"}), @ORM\Index(name="IDX_197B014F5B41AD20", columns={"relais_id"}), @ORM\Index(name="IDX_197B014F9F7E4405", columns={"secteur_id"}), @ORM\Index(name="IDX_197B014FDF1E57AB", columns={"quartier_id"}), @ORM\Index(name="IDX_197B014F727ACA70", columns={"parent_id"}), @ORM\Index(name="IDX_197B014FC986DC6A", columns={"asmat_id"}), @ORM\Index(name="IDX_197B014F98DE13AC", columns={"partenaire_id"}), @ORM\Index(name="IDX_197B014FA76ED395", columns={"user_id"}), @ORM\Index(name="IDX_197B014F2826D246", columns={"relais_qui_id"}), @ORM\Index(name="IDX_197B014FFAF2AFEE", columns={"user_qui_id"})})
 * @ORM\Entity
 */
class GwContact
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_saisie", type="date", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateSaisie;

    /**
     * @var string
     *
     * @ORM\Column(name="date_contact", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateContact;

    /**
     * @var string
     *
     * @ORM\Column(name="date_fin", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $dateFin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_contact", type="time", precision=0, scale=0, nullable=true, unique=false)
     */
    private $heureContact;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="duree", type="time", precision=0, scale=0, nullable=true, unique=false)
     */
    private $duree;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $genre;

    /**
     * @var string
     *
     * @ORM\Column(name="information", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $information;

    /**
     * @var string
     *
     * @ORM\Column(name="quifilter", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $quifilter;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $commentaire;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $active;

    /**
     * @var string
     *
     * @ORM\Column(name="famille_contact", type="string", length=3, precision=0, scale=0, nullable=true, unique=false)
     */
    private $familleContact;

    /**
     * @var string
     *
     * @ORM\Column(name="departement", type="string", length=10, precision=0, scale=0, nullable=true, unique=false)
     */
    private $departement;

    /**
     * @var string
     *
     * @ORM\Column(name="utilisatrice", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $utilisatrice;

    /**
     * @var boolean
     *
     * @ORM\Column(name="archived", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $archived;

    /**
     * @var string
     *
     * @ORM\Column(name="heure_debut", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $heureDebut;

    /**
     * @var string
     *
     * @ORM\Column(name="heure_fin", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $heureFin;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire_coffre", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $commentaireCoffre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="date", precision=0, scale=0, nullable=true, unique=false)
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
     * @ORM\Column(name="transAgenda", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $transagenda;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\GwRenseignementContact
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwRenseignementContact")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="renseignement_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $renseignement;

    /**
     * @var \AppBundle\Entity\GwTypeContact
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwTypeContact")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $type;

    /**
     * @var \AppBundle\Entity\GwAm
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwAm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="asmat_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $asmat;

    /**
     * @var \AppBundle\Entity\GwMotifContact
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwMotifContact")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="motif_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $motif;

    /**
     * @var \AppBundle\Entity\GwUsers
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_qui_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $userQui;

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
     * @var \AppBundle\Entity\GwUsers
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $user;

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
     * @var \AppBundle\Entity\GwRelaisContact
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwRelaisContact")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="relais_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $relais;

    /**
     * @var \AppBundle\Entity\GwOccasionContact
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwOccasionContact")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occasion_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $occasion;

    /**
     * @var \AppBundle\Entity\GwMoyenContact
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwMoyenContact")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="moyen_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $moyen;

    /**
     * @var \AppBundle\Entity\GwParent
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwParent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $parent;

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
     * @var \AppBundle\Entity\GwPartenaire
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwPartenaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="partenaire_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $partenaire;

    /**
     * @var \AppBundle\Entity\GwRelaisContact
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwRelaisContact")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="relais_qui_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $relaisQui;



    /**
     * Set dateSaisie
     *
     * @param \DateTime $dateSaisie
     *
     * @return GwContact
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
     * Set dateContact
     *
     * @param string $dateContact
     *
     * @return GwContact
     */
    public function setDateContact($dateContact)
    {
        $this->dateContact = $dateContact;

        return $this;
    }

    /**
     * Get dateContact
     *
     * @return string
     */
    public function getDateContact()
    {
        return $this->dateContact;
    }

    /**
     * Set dateFin
     *
     * @param string $dateFin
     *
     * @return GwContact
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return string
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set heureContact
     *
     * @param \DateTime $heureContact
     *
     * @return GwContact
     */
    public function setHeureContact($heureContact)
    {
        $this->heureContact = $heureContact;

        return $this;
    }

    /**
     * Get heureContact
     *
     * @return \DateTime
     */
    public function getHeureContact()
    {
        return $this->heureContact;
    }

    /**
     * Set duree
     *
     * @param \DateTime $duree
     *
     * @return GwContact
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return \DateTime
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set genre
     *
     * @param string $genre
     *
     * @return GwContact
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set information
     *
     * @param string $information
     *
     * @return GwContact
     */
    public function setInformation($information)
    {
        $this->information = $information;

        return $this;
    }

    /**
     * Get information
     *
     * @return string
     */
    public function getInformation()
    {
        return $this->information;
    }

    /**
     * Set quifilter
     *
     * @param string $quifilter
     *
     * @return GwContact
     */
    public function setQuifilter($quifilter)
    {
        $this->quifilter = $quifilter;

        return $this;
    }

    /**
     * Get quifilter
     *
     * @return string
     */
    public function getQuifilter()
    {
        return $this->quifilter;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return GwContact
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
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return GwContact
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
     * Set active
     *
     * @param boolean $active
     *
     * @return GwContact
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set familleContact
     *
     * @param string $familleContact
     *
     * @return GwContact
     */
    public function setFamilleContact($familleContact)
    {
        $this->familleContact = $familleContact;

        return $this;
    }

    /**
     * Get familleContact
     *
     * @return string
     */
    public function getFamilleContact()
    {
        return $this->familleContact;
    }

    /**
     * Set departement
     *
     * @param string $departement
     *
     * @return GwContact
     */
    public function setDepartement($departement)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return string
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Set utilisatrice
     *
     * @param string $utilisatrice
     *
     * @return GwContact
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
     * Set archived
     *
     * @param boolean $archived
     *
     * @return GwContact
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
     * Set heureDebut
     *
     * @param string $heureDebut
     *
     * @return GwContact
     */
    public function setHeureDebut($heureDebut)
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    /**
     * Get heureDebut
     *
     * @return string
     */
    public function getHeureDebut()
    {
        return $this->heureDebut;
    }

    /**
     * Set heureFin
     *
     * @param string $heureFin
     *
     * @return GwContact
     */
    public function setHeureFin($heureFin)
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    /**
     * Get heureFin
     *
     * @return string
     */
    public function getHeureFin()
    {
        return $this->heureFin;
    }

    /**
     * Set commentaireCoffre
     *
     * @param string $commentaireCoffre
     *
     * @return GwContact
     */
    public function setCommentaireCoffre($commentaireCoffre)
    {
        $this->commentaireCoffre = $commentaireCoffre;

        return $this;
    }

    /**
     * Get commentaireCoffre
     *
     * @return string
     */
    public function getCommentaireCoffre()
    {
        return $this->commentaireCoffre;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwContact
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
     * @return GwContact
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
     * Set transagenda
     *
     * @param boolean $transagenda
     *
     * @return GwContact
     */
    public function setTransagenda($transagenda)
    {
        $this->transagenda = $transagenda;

        return $this;
    }

    /**
     * Get transagenda
     *
     * @return boolean
     */
    public function getTransagenda()
    {
        return $this->transagenda;
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
     * Set renseignement
     *
     * @param \AppBundle\Entity\GwRenseignementContact $renseignement
     *
     * @return GwContact
     */
    public function setRenseignement(\AppBundle\Entity\GwRenseignementContact $renseignement = null)
    {
        $this->renseignement = $renseignement;

        return $this;
    }

    /**
     * Get renseignement
     *
     * @return \AppBundle\Entity\GwRenseignementContact
     */
    public function getRenseignement()
    {
        return $this->renseignement;
    }

    /**
     * Set type
     *
     * @param \AppBundle\Entity\GwTypeContact $type
     *
     * @return GwContact
     */
    public function setType(\AppBundle\Entity\GwTypeContact $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AppBundle\Entity\GwTypeContact
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set asmat
     *
     * @param \AppBundle\Entity\GwAm $asmat
     *
     * @return GwContact
     */
    public function setAsmat(\AppBundle\Entity\GwAm $asmat = null)
    {
        $this->asmat = $asmat;

        return $this;
    }

    /**
     * Get asmat
     *
     * @return \AppBundle\Entity\GwAm
     */
    public function getAsmat()
    {
        return $this->asmat;
    }

    /**
     * Set motif
     *
     * @param \AppBundle\Entity\GwMotifContact $motif
     *
     * @return GwContact
     */
    public function setMotif(\AppBundle\Entity\GwMotifContact $motif = null)
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get motif
     *
     * @return \AppBundle\Entity\GwMotifContact
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * Set userQui
     *
     * @param \AppBundle\Entity\GwUsers $userQui
     *
     * @return GwContact
     */
    public function setUserQui(\AppBundle\Entity\GwUsers $userQui = null)
    {
        $this->userQui = $userQui;

        return $this;
    }

    /**
     * Get userQui
     *
     * @return \AppBundle\Entity\GwUsers
     */
    public function getUserQui()
    {
        return $this->userQui;
    }

    /**
     * Set quartier
     *
     * @param \AppBundle\Entity\GwQuartier $quartier
     *
     * @return GwContact
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
     * @return GwContact
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
     * Set ville
     *
     * @param \AppBundle\Entity\GwVille $ville
     *
     * @return GwContact
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
     * Set relais
     *
     * @param \AppBundle\Entity\GwRelaisContact $relais
     *
     * @return GwContact
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
     * Set occasion
     *
     * @param \AppBundle\Entity\GwOccasionContact $occasion
     *
     * @return GwContact
     */
    public function setOccasion(\AppBundle\Entity\GwOccasionContact $occasion = null)
    {
        $this->occasion = $occasion;

        return $this;
    }

    /**
     * Get occasion
     *
     * @return \AppBundle\Entity\GwOccasionContact
     */
    public function getOccasion()
    {
        return $this->occasion;
    }

    /**
     * Set moyen
     *
     * @param \AppBundle\Entity\GwMoyenContact $moyen
     *
     * @return GwContact
     */
    public function setMoyen(\AppBundle\Entity\GwMoyenContact $moyen = null)
    {
        $this->moyen = $moyen;

        return $this;
    }

    /**
     * Get moyen
     *
     * @return \AppBundle\Entity\GwMoyenContact
     */
    public function getMoyen()
    {
        return $this->moyen;
    }

    /**
     * Set parent
     *
     * @param \AppBundle\Entity\GwParent $parent
     *
     * @return GwContact
     */
    public function setParent(\AppBundle\Entity\GwParent $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \AppBundle\Entity\GwParent
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set secteur
     *
     * @param \AppBundle\Entity\GwSecteur $secteur
     *
     * @return GwContact
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
     * Set partenaire
     *
     * @param \AppBundle\Entity\GwPartenaire $partenaire
     *
     * @return GwContact
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
     * Set relaisQui
     *
     * @param \AppBundle\Entity\GwRelaisContact $relaisQui
     *
     * @return GwContact
     */
    public function setRelaisQui(\AppBundle\Entity\GwRelaisContact $relaisQui = null)
    {
        $this->relaisQui = $relaisQui;

        return $this;
    }

    /**
     * Get relaisQui
     *
     * @return \AppBundle\Entity\GwRelaisContact
     */
    public function getRelaisQui()
    {
        return $this->relaisQui;
    }
}
