<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GwLieuscolarisation
 *
 * @ORM\Table(name="gw_lieuscolarisation")
 * @ORM\Entity
 */
class GwLieuscolarisation
{
    /**
     * @var string
     *
     * @ORM\Column(name="lieuScolarisation", type="string", length=70, precision=0, scale=0, nullable=false, unique=false)
     */
    private $lieuscolarisation;

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
     * Set lieuscolarisation
     *
     * @param string $lieuscolarisation
     *
     * @return GwLieuscolarisation
     */
    public function setLieuscolarisation($lieuscolarisation)
    {
        $this->lieuscolarisation = $lieuscolarisation;

        return $this;
    }

    /**
     * Get lieuscolarisation
     *
     * @return string
     */
    public function getLieuscolarisation()
    {
        return $this->lieuscolarisation;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return GwLieuscolarisation
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
     * @return GwLieuscolarisation
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
