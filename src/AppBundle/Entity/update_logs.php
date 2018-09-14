<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * update_logs
 *
 * @ORM\Table(name="update_logs")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\update_logsRepository")
 */
class update_logs
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="user_gw_id", type="integer", nullable=true)
     */
    private $userGwId;

    /**
     * @var string
     *
     * @ORM\Column(name="table_name", type="string", length=255, nullable=true)
     */
    private $tableName;

    /**
     * @var string
     *
     * @ORM\Column(name="champ_name", type="string", length=255, nullable=true)
     */
    private $champName;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", nullable=true)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="statu", type="string", length=255, nullable=true)
     */
    private $statu;

    /**
     * @var string
     *
     * @ORM\Column(name="commante", type="text", nullable=true)
     */
    private $commante;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="user_type", type="string", length=50, nullable=true)
     */
    private $userType;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_date", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $update_date;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="insert_date", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $insert_date;
    /**
     * @var int
     *
     * @ORM\Column(name="row_id", type="integer", nullable=true)
     */
    private $row_id;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userGwId
     *
     * @param integer $userGwId
     *
     * @return update_logs
     */
    public function setUserGwId($userGwId)
    {
        $this->userGwId = $userGwId;

        return $this;
    }

    /**
     * Get userGwId
     *
     * @return int
     */
    public function getUserGwId()
    {
        return $this->userGwId;
    }

    /**
     * Set tableName
     *
     * @param string $tableName
     *
     * @return update_logs
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;

        return $this;
    }

    /**
     * Get tableName
     *
     * @return string
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * Set champName
     *
     * @param string $champName
     *
     * @return update_logs
     */
    public function setChampName($champName)
    {
        $this->champName = $champName;

        return $this;
    }

    /**
     * Get champName
     *
     * @return string
     */
    public function getChampName()
    {
        return $this->champName;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return update_logs
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set statu
     *
     * @param string $statu
     *
     * @return update_logs
     */
    public function setStatu($statu)
    {
        $this->statu = $statu;

        return $this;
    }

    /**
     * Get statu
     *
     * @return string
     */
    public function getStatu()
    {
        return $this->statu;
    }

    /**
     * Set commante
     *
     * @param string $commante
     *
     * @return update_logs
     */
    public function setCommante($commante)
    {
        $this->commante = $commante;

        return $this;
    }

    /**
     * Get commante
     *
     * @return string
     */
    public function getCommante()
    {
        return $this->commante;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return update_logs
     */
    public function setUserId($UserId)
    {
        $this->userId = $UserId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }
    /**
     * Set rowid
     *
     * @param integer $rowid
     *
     * @return update_logs
     */
    public function setRowid($rowId)
    {
        $this->row_id = $rowId;

        return $this;
    }

    /**
     * Get userid
     *
     * @return int
     */
    public function getRowid()
    {
        return $this->row_id;
    }
    /**
     * Set userType
     *
     * @param string $UserType
     *
     * @return update_logs
     */
    public function setUserType($UserType)
    {
        $this->userType = $UserType;

        return $this;
    }

    /**
     * Get userType
     *
     * @return string
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * Set update_date
     *
     * @param \DateTime $update_date
     *
     * @return GwTempsCollectifs
     */
    public function setUpdateDate($update_date)
    {
        $this->update_date = $update_date;

        return $this;
    }

    /**
     * Get update_date
     *
     * @return \DateTime
     */
    public function getUpdateDate()
    {
        return $this->update_date;
    }
    /**
     * Set insert_date
     *
     * @param \DateTime $insert_date
     *
     * @return GwTempsCollectifs
     */
    public function setInsertDate($insert_date)
    {
        $this->insert_date = $insert_date;

        return $this;
    }

    /**
     * Get insert_date
     *
     * @return \DateTime
     */
    public function getInsertDate()
    {
        return $this->insert_date;
    }

}

