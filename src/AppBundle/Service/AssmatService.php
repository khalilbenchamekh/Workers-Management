<?php
/**
 * Created by PhpStorm.
 * User: RABAH Ismail
 * Date: 26/05/2017
 * Time: 16:45
 */

namespace AppBundle\Service;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\GwAm;

class AssmatService
{
    protected $em;
    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }
    //get Assmat Nom & Prenom By am Id
    public function getAssmatNams( $userid ){
        $Assmat = $this->em->getRepository('AppBundle:GwAm', 'gramweb')->findOneById($userid);
        $nams = [
            'nam1' => $Assmat->getNomNaissance(),
            'pre1' => $Assmat->getPrenomNaissance(),
        ];
        return $nams;
    }
    /**
     * get assmat Agrements By am Id
     * @param GwAm $amid
     * @return array
     */
    public function getAgremets( GwAm $amid ){
        $ags = $this->em->getRepository('AppBundle:GwAgrement', 'gramweb')->findByAssmat($amid);
        $data = [];
        foreach ( $ags as $ag){ $data[] = $ag; }
        return $data;
    }
}