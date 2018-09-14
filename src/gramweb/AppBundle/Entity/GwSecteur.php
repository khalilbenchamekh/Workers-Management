<?php

namespace AppBundle\Entity;

/**
 * GwSecteur
 */
class GwSecteur
{
    /**
     * @var string
     */
    private $titre;

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
    private $afficher;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\GwVille
     */
    private $ville;


    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return GwSecteur
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwSecteur
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
     * @return GwSecteur
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
     * @return GwSecteur
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
     * Set ville
     *
     * @param \AppBundle\Entity\GwVille $ville
     *
     * @return GwSecteur
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
}
