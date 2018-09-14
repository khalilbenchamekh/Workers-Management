<?php
/**
 * Created by PhpStorm.
 * User: RABAH ismail
 * Date: 02/06/2017
 * Time: 09:46
 */

namespace AppBundle\Repository;
use Doctrine\ORM\EntityRepository;

class GwEnfantacceuilRepository extends EntityRepository
{
    /**
     * get All Enfn For One Am
     * @param $id
     * @return array
     */
    public function getAllEnfnForOneAm( $id  , $distac = false){
        $query = $this->createQueryBuilder('ea')
            ->innerJoin('ea.agrement', 'ag', 'WITH', 'ag.assmat = :amid')
            ->where('ea.depart = :zero')
//            ->andWhere('ea.enfant.age = :age')
            ->setParameter('amid', $id )
            ->setParameter('zero', 0 )
//            ->setParameter('age', 6 )
            ->getQuery();
        $qr = $query->getResult();
        if($distac){
            $ret = [];
            $enfant = [];
            foreach ($qr as $q ){
                if( ! in_array( $q->getEnfant() , $enfant) &&  ($q->getEnfant()->getAge() <= 6 ) ){
                    $enfant[] = $q->getEnfant();
                    $ret[] = $q;
                }
            }
            return $ret;
        }else
            return $qr;
    }
    /**
     * Get All Assistance maternille for this famille
     * @param $enfantsids
     * @return array
     */
    public function getAllAmForOneFam( $enfantsids  ){
        $qr = $this->createQueryBuilder('ea')
            ->join('ea.agrement', 'ag')
            ->join('ag.assmat', 'a')
            ->distinct(true)
            ->addSelect('ea')
            ->addSelect('ag')
            ->addSelect('a')
            ->where('ea.enfant in ('.$enfantsids.')')
            ->andWhere('ea.depart = :zero')
            ->setParameter('zero', 0 )
            ->getQuery()
            ->getResult();

        $ret = [];
        foreach ($qr as $q ){
            if( ! in_array($q->getAgrement()->getAssmat(),$ret) )
                $ret[] =$q->getAgrement()->getAssmat();
        }
        return $ret;
    }
}