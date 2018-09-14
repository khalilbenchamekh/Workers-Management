<?php

namespace AppBundle\Entity;

/**
 * GwAdresseam
 */
class GwAdresseam
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $cdrue;

    /**
     * @var string
     */
    private $norue;

    /**
     * @var string
     */
    private $bister;

    /**
     * @var string
     */
    private $liboff;

    /**
     * @var string
     */
    private $canton;

    /**
     * @var string
     */
    private $quart;

    /**
     * @var string
     */
    private $squart;

    /**
     * @var string
     */
    private $libquart;

    /**
     * @var string
     */
    private $libsquart;

    /**
     * @var string
     */
    private $cdpost;

    /**
     * @var string
     */
    private $rivoli;


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
     * Set cdrue
     *
     * @param string $cdrue
     *
     * @return GwAdresseam
     */
    public function setCdrue($cdrue)
    {
        $this->cdrue = $cdrue;

        return $this;
    }

    /**
     * Get cdrue
     *
     * @return string
     */
    public function getCdrue()
    {
        return $this->cdrue;
    }

    /**
     * Set norue
     *
     * @param string $norue
     *
     * @return GwAdresseam
     */
    public function setNorue($norue)
    {
        $this->norue = $norue;

        return $this;
    }

    /**
     * Get norue
     *
     * @return string
     */
    public function getNorue()
    {
        return $this->norue;
    }

    /**
     * Set bister
     *
     * @param string $bister
     *
     * @return GwAdresseam
     */
    public function setBister($bister)
    {
        $this->bister = $bister;

        return $this;
    }

    /**
     * Get bister
     *
     * @return string
     */
    public function getBister()
    {
        return $this->bister;
    }

    /**
     * Set liboff
     *
     * @param string $liboff
     *
     * @return GwAdresseam
     */
    public function setLiboff($liboff)
    {
        $this->liboff = $liboff;

        return $this;
    }

    /**
     * Get liboff
     *
     * @return string
     */
    public function getLiboff()
    {
        return $this->liboff;
    }

    /**
     * Set canton
     *
     * @param string $canton
     *
     * @return GwAdresseam
     */
    public function setCanton($canton)
    {
        $this->canton = $canton;

        return $this;
    }

    /**
     * Get canton
     *
     * @return string
     */
    public function getCanton()
    {
        return $this->canton;
    }

    /**
     * Set quart
     *
     * @param string $quart
     *
     * @return GwAdresseam
     */
    public function setQuart($quart)
    {
        $this->quart = $quart;

        return $this;
    }

    /**
     * Get quart
     *
     * @return string
     */
    public function getQuart()
    {
        return $this->quart;
    }

    /**
     * Set squart
     *
     * @param string $squart
     *
     * @return GwAdresseam
     */
    public function setSquart($squart)
    {
        $this->squart = $squart;

        return $this;
    }

    /**
     * Get squart
     *
     * @return string
     */
    public function getSquart()
    {
        return $this->squart;
    }

    /**
     * Set libquart
     *
     * @param string $libquart
     *
     * @return GwAdresseam
     */
    public function setLibquart($libquart)
    {
        $this->libquart = $libquart;

        return $this;
    }

    /**
     * Get libquart
     *
     * @return string
     */
    public function getLibquart()
    {
        return $this->libquart;
    }

    /**
     * Set libsquart
     *
     * @param string $libsquart
     *
     * @return GwAdresseam
     */
    public function setLibsquart($libsquart)
    {
        $this->libsquart = $libsquart;

        return $this;
    }

    /**
     * Get libsquart
     *
     * @return string
     */
    public function getLibsquart()
    {
        return $this->libsquart;
    }

    /**
     * Set cdpost
     *
     * @param string $cdpost
     *
     * @return GwAdresseam
     */
    public function setCdpost($cdpost)
    {
        $this->cdpost = $cdpost;

        return $this;
    }

    /**
     * Get cdpost
     *
     * @return string
     */
    public function getCdpost()
    {
        return $this->cdpost;
    }

    /**
     * Set rivoli
     *
     * @param string $rivoli
     *
     * @return GwAdresseam
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
}
