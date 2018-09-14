<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwRole
 *
 * @ORM\Table(name="gw_role")
 * @ORM\Entity
 */
class GwRole
{
    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=80, precision=0, scale=0, nullable=false, unique=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="droits", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $droits;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $createdat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $updatedat;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return GwRole
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
     * Set droits
     *
     * @param string $droits
     *
     * @return GwRole
     */
    public function setDroits($droits)
    {
        $this->droits = $droits;

        return $this;
    }

    /**
     * Get droits
     *
     * @return string
     */
    public function getDroits()
    {
        return $this->droits;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwRole
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
     * @return GwRole
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
