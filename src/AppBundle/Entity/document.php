<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * document
 *
 * @ORM\Table(name="document")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="AppBundle\Repository\documentRepository")
 */
class document
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\NotBlank
     */
    private $title;
    /**
     * @var string
     *
     * @ORM\Column(name="commant", type="string", length=255)
     * @Assert\NotBlank
     */
    private $commant;
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank
     */
    private $name;


//,
//*      mimeTypes = {
//*          "image/png",
//*          "image/jpeg",
//*          "image/jpg",
//*          "image/gif",
//*          "application/pdf",
//*          "application/x-pdf"
//*      }

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\File(maxSize="6000000")
     */
    private $file;
    
    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="filetype", type="string", length=255, nullable=true)
     */
     private $filetype;
    /**
     * @var string
     *
     * @ORM\Column(name="docaccess", type="string", length=255, nullable=true)
     */
     private $docaccess;
     //{ all , parent , am , part , sparent , sam , spart }
    /**
     * @var string
     *
     * @ORM\Column(name="sparentids", type="string", length=500, nullable=true)
     */
    private $sparentids;
    /**
     * @var string
     *
     * @ORM\Column(name="samids", type="string", length=500, nullable=true)
     */
    private $samids;
    /**
     * @var string
     *
     * @ORM\Column(name="spartids", type="string", length=500, nullable=true)
     */
    private $spartids;
    /**
     * @var string
     *
     * @ORM\Column(name="scollectifids", type="string", length=500, nullable=true)
     */
    private $scollectifids;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        // check if we have an old image path
        if (isset($this->path)) {
            // store the old name to delete after the update
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }
    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }
    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }
    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }
    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/documents';
    }
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        // la propriété « file » peut être vide si le champ n'est pas requis
        if (null === $this->file) {
            return;
        }

        if ($this->path != $this->file->getClientOriginalName()) {
            $this->path = $this->file->getClientOriginalName();
        }
    }
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        // la propriété « file » peut être vide si le champ n'est pas requis
        if (null === $this->file) {
            return;
        }

        $file_name = $this->file->getClientOriginalName();

        // la méthode « move » prend comme arguments le répertoire cible et
        // le nom de fichier cible où le fichier doit être déplacé
        if (!file_exists($this->getUploadRootDir())) {
            mkdir($this->getUploadRootDir(), 0775, true);
        }
        $this->file->move(
            $this->getUploadRootDir(), $file_name
        );
        $this->file = null;
    }
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
     * Set name
     *
     * @param string $name
     *
     * @return document
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
//
//    /**
//     * Set file
//     *
//     * @param \stdClass $file
//     *
//     * @return document
//     */
//    public function setFile($file)
//    {
//        $this->file = $file;
//
//        return $this;
//    }
//
//    /**
//     * Get file
//     *
//     * @return \stdClass
//     */
//    public function getFile()
//    {
//        return $this->file;
//    }


    /**
     * Set path
     *
     * @param string $path
     *
     * @return document
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
     * Set filetype
     *
     * @param string $filetype
     *
     * @return document
     */
    public function setFiletype($filetype)
    {
        $this->filetype = $filetype;

        return $this;
    }
    /**
     * Get filetype
     *
     * @return string
     */
    public function getFiletype()
    {
        return $this->filetype;
    }
    /**
     * Set title
     *
     * @param string $title
     *
     * @return document
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }
    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * Set commant
     *
     * @param string $commant
     *
     * @return document
     */
    public function setCommant($commant)
    {
        $this->commant = $commant;

        return $this;
    }
    /**
     * Get commant
     *
     * @return string
     */
    public function getCommant()
    {
        return $this->commant;
    }
    /**
     * Set docaccess
     *
     * @param string $docaccess
     *
     * @return document
     */
    public function setDocaccess($docaccess)
    {
        $this->docaccess = $docaccess;

        return $this;
    }
    /**
     * Get docaccess
     *
     * @return string
     */
    public function getDocaccess()
    {
        return $this->docaccess;
    }
    /**
     * Set sparentids
     *
     * @param string $sparentids
     *
     * @return document
     */
    public function setSparentids($sparentids)
    {
        $this->sparentids = $sparentids;

        return $this;
    }
    /**
     * Get sparentids
     *
     * @return string
     */
    public function getSparentids()
    {
        return $this->sparentids;
    }
    /**
     * Set samids
     *
     * @param string $samids
     *
     * @return document
     */
    public function setSamids($samids)
    {
        $this->samids = $samids;

        return $this;
    }
    /**
     * Get samids
     *
     * @return string
     */
    public function getSamids()
    {
        return $this->samids;
    }
    /**
     * Set spartids
     *
     * @param string $spartids
     *
     * @return document
     */
    public function setSpartids($spartids)
    {
        $this->spartids = $spartids;

        return $this;
    }
    /**
     * Get spartids
     *
     * @return string
     */
    public function getSpartids()
    {
        return $this->spartids;
    }
    /**
     * Set scollectifids
     *
     * @param string $scollectifids
     *
     * @return document
     */
    public function setScollectifids($scollectifids)
    {
        $this->scollectifids = $scollectifids;

        return $this;
    }
    /**
     * Get scollectifids
     *
     * @return string
     */
    public function getScollectifids()
    {
        return $this->scollectifids;
    }
}

