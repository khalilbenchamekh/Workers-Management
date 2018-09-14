<?php
/**
 * Created by PhpStorm.
 * User: RABAH Ismail
 * Date: 24/05/2017
 * Time: 10:45
 */

namespace AppBundle\Service;
use Doctrine\ORM\EntityManager;
//use ADesigns\CalendarBundle\Entity\EventEntity;
class ParentGenerator
{
    protected $em;
    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * get les des responsable de famille
     * @param $userid
     * @return array
     */
    public function getResposNams( $userid){
//        $emgw = $this->get('doctrine')->getManager('gramweb');
//        $thisUserId =$this->getuser()->getp_a_pt_id();
        $Parnet = $this->em->getRepository('AppBundle:GwParent', 'gramweb')->findOneById($userid);
        $nams = [
            'nam1' => ($Parnet->getResponsable1() != null )? $Parnet->getResponsable1()->getNom() : "Responsable1",
            'pre1' => ($Parnet->getResponsable1() != null )? $Parnet->getResponsable1()->getPrenom(): "",
            'nam2' => ($Parnet->getResponsable2() != null )? $Parnet->getResponsable2()->getNom(): "Responsable2" ,
            'pre2' => ($Parnet->getResponsable2() != null )? $Parnet->getResponsable2()->getPrenom() :"",
        ];
        return $nams;
    }
    public function getSituationFamilleNam($id){
        $nams = [
            0 => 'N\'est pas spécifié' ,
            1 => 'Mariés' ,
            2 => 'Concubins' ,
            3 => 'Célibataire' ,
            4 => 'N\'est pas spécifié' ,
        ];
        if( in_array( $id , [0 , 1 , 2 ,3 ,4]))
            return $nams[$id];
        else
            return ' ';
    }
    public function getCivilites($id){
        $nams = [
            0 => 'N\'est pas spécifié' ,
            1 => 'M' ,
            2 => 'Mme' ,
        ];
        if( in_array( $id , [0 , 1 , 2]))
            return $nams[$id];
        else
            return ' ';
    }

    /**
     * Docs : Show temps Coll
     * @param $ids
     * @return string
     */
    public function getTempsCollectifHtmlRows($ids){
        $Rows = "";
        $tcRepos = $this->em->getRepository( 'AppBundle:GwTempsCollectifs' , 'gramweb');

        $qb = $tcRepos->createQueryBuilder('t')
            ->select('t.id , t.nom ,t.date')
            ->where(' t.id in ('.$ids.')')
//            ->setParameter('ids' , $ids)
            ->getQuery();
        $tpcls = $qb->getResult();
        foreach ( $tpcls as $tc){
            $Rows .= '<div class="myrow">'
                .'<span class="col-lg-4 col-md-4 col-sm-4 " >'.$tc["id"].'</span>'
                .'<span class="col-lg-8 col-md-8 col-sm-8 " >'.$tc["nom"].' - '.date_format($tc["date"], 'd-m-Y').' </span>'
                .' </div>';
        }
        return $Rows;
    }

    /**
     * Docs:ModalsActions
     * get agenda as html output for Docs modal
     * @param $ids
     * @return string
     */
    public function getTempsCol( $ids ){
        $tempC = $this->em->getRepository( 'AppBundle:GwTempsCollectifs' , 'gramweb')->findAll();
        $EventsForCal = array();
        foreach( $tempC as $temp ){
            $isUsed = false;
            $e = array();
            $e['id'] = $temp->getId();
            $e['title'] = $temp->getNom() . ' - ' . $temp->getLieu();
            $e['start'] = $temp->getDate()->format('Y-m-d H:i:s');
            $e['HDeb'] = $temp->getHDeb();
            $e['HFin'] = $temp->getHFin();
            $e['url2'] = "#";
            $e['isUsed'] = $isUsed;
            $e['backgroundColor'] = in_array($temp->getId() , $ids ) ? 'rgb(251, 134, 35)' :'#5fb3f0' ;//#09c909
            array_push($EventsForCal, $e);
        }
        return ($EventsForCal);
    }

//    public function checkResrvForUserInTcs(){
//
//        return $tempC = $this->em->getRepository( 'AppBundle:GwReservationtempscollectifs' , 'gramweb')->findAll();
//
//    }
}