<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwDocuments
 *
 * @ORM\Table(name="gw_documents", indexes={@ORM\Index(name="IDX_FCA0BF7B323C9A1C", columns={"am_id"}), @ORM\Index(name="IDX_FCA0BF7B727ACA70", columns={"parent_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GwDocumentsRepository" )
 */
class GwDocuments
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $description;

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
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $path;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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
     * @var \AppBundle\Entity\GwAm
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\GwAm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="am_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $am;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return GwDocuments
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return GwDocuments
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwDocuments
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
     * @return GwDocuments
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
     * Set path
     *
     * @param string $path
     *
     * @return GwDocuments
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
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
     * Set parent
     *
     * @param \AppBundle\Entity\GwParent $parent
     *
     * @return GwDocuments
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
     * Set am
     *
     * @param \AppBundle\Entity\GwAm $am
     *
     * @return GwDocuments
     */
    public function setAm(\AppBundle\Entity\GwAm $am = null)
    {
        $this->am = $am;

        return $this;
    }

    /**
     * Get am
     *
     * @return \AppBundle\Entity\GwAm
     */
    public function getAm()
    {
        return $this->am;
    }
}
