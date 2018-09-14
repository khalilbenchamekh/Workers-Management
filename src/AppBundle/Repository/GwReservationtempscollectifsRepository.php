<?php
/**
 * Created by PhpStorm.
 * User: RABAH Ismail
 * Date: 26/05/2017
 * Time: 09:33
 */

namespace AppBundle\Repository;
use Doctrine\ORM\EntityRepository;

class GwReservationtempscollectifsRepository extends EntityRepository
{
    /**
     * getTcIdsForOne
     * @param int $userid
     * @param null $usertype
     * @return array
     */
    public function getTcIdsForOne(  $userid = 0, $usertype = null)
    {
        $qb = $this->createQueryBuilder('u' );
        $qb->select('IDENTITY ( u.tempsColl)');

        if ($usertype == "familleReservation") {
            $qb->andWhere('u.familleReservation = :parentid');
            $qb->setParameter('parentid', $userid);
        } elseif ($usertype == "assmatReservation") {
            $qb->andWhere('u.assmatReservation = :assmatid');
            $qb->setParameter('assmatid', $userid);
        } elseif ($usertype == "partenaireReservation") {
            $qb->andWhere('u.partenaireReservation = :partid');
            $qb->setParameter('partid', $userid);
        }
        $valeus = $qb->getQuery()->getScalarResult();
        return $valeus;
    }

    /**
     * check Am In Tc
     * @param $amid
     * @param $tcid
     * @return mixed
     */
    public function checkAmInTc($amid , $tcid){
        return $this->createQueryBuilder('r')
            ->select('COUNT(r.id)')
            ->where('r.tempsColl = :tcid')
            ->andWhere('r.assmatReservation = :amid')
            ->setParameter('tcid' , $tcid)
            ->setParameter('amid' , $amid)
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * get Users Ids Of One Tc and one user type
     * @param $tcid
     * @param $usertype
     * @return array
     */
    public function getUsersIdsOfOneTc( $tcid , $usertype){
        $q = $this->createQueryBuilder('r');

        if( $usertype != "all"){
            if ($usertype == "enafntAccueilliReservation")
                $q = $q->select('IDENTITY(r.enafntAccueilliReservation)');
            elseif ($usertype == "enfantAssmatReservation")
                $q = $q->select('IDENTITY(r.enfantAssmatReservation)');
            elseif ($usertype == "enfantFamilleReservation")
                $q = $q->select('IDENTITY(r.enfantFamilleReservation)');
        }else{
            $q = $q->select('IDENTITY(r.enafntAccueilliReservation)')
                ->select('IDENTITY(r.enfantAssmatReservation)')
                ->select('IDENTITY(r.enfantFamilleReservation)');
        }
        $q=$q->where('r.tempsColl = :tcid')
            ->setParameter( ':tcid' , $tcid );

        $data =  $q->getQuery()->getResult();

        return $data ;
    }
    /**
     * checkResrvForUserInTcs
     * @param $userid
     * @param $usertype
     * @param $tcids
     * @return array|mixed
     */
    public function checkResrvForUserInTcs($userid ,$usertype, $tcids ){
        $tpcls = [];
        if( $tcids != ""){
            $qb = $this->createQueryBuilder('r' )
                ->select('COUNT(r.id)')
                ->where('r.tempsColl in ('.$tcids.')');
            if( $usertype == "parent"){
                $qb = $qb ->andWhere( 'r.familleReservation = :userid');
            }elseif( $usertype == "assmat"){
                $qb = $qb ->andWhere( 'r.assmatReservation = :userid');
            }elseif( $usertype == "part"){
                $qb = $qb ->andWhere( 'r.partenaireReservation = :userid');
            }
            $qb = $qb->setParameter('userid' , $userid)
                ->getQuery();
            $tpcls = $qb->getSingleScalarResult();
        }
        return $tpcls;
    }
    /**
     * getReservCount
     * @param $tcid
     * @return mixed
     */
    public function getReservCount($tcid){
         return $this->createQueryBuilder('r')
            ->select('COUNT(r.id)')
            ->where('r.tempsColl = :tc AND ( r.assmatReservation <> 0 OR r.partenaireReservation <> 0 OR r.familleReservation <> 0) ')
            ->setParameter('tc' , $tcid)
            ->getQuery()->getSingleScalarResult();
    }
    /**
     * get Reserv Count Enf
     * @param $tcid
     * @return mixed
     */
    public function getReservCountEnf($tcid){
        return $this->createQueryBuilder('r')
            ->select('COUNT(r.id)')
            ->where('r.tempsColl  = :tc AND ( r.enfantFamilleReservation <> 0 OR r.enfantAssmatReservation <> 0 OR r.enafntAccueilliReservation <> 0 ) ')
            ->setParameter('tc' , $tcid)
            ->getQuery()->getSingleScalarResult();
    }

}