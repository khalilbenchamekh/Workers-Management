<?php
/**
 * Created by PhpStorm.
 * User: RABAH Ismail
 * Date: 13/07/2017
 * Time: 10:01
 */

namespace AppBundle\Repository;
use Doctrine\ORM\EntityRepository;

class GwTempsCollectifsRepository extends EntityRepository
{
    /**
     * get Valide Events By Date
     * @return array
     */
    public function getValideEvents(){
        $qr = $this->createQueryBuilder('e')
            ->select('e')
            ->where('e.date > \''.date("Y-m-d H:i:s").'\'' )
            ->getQuery()
            ->getResult();
        return $qr;
    }
    /**
     * Get temps collictif by array ids
     * @param $tcids
     * @return array
     */
    public function getByids( $tcids ){
        return $this->createQueryBuilder('t')
            ->where('t.id in ('.$tcids.')')
            ->getQuery()
            ->getResult();
    }

    public function getToDayTC(){
        $now = new \DateTime();
        $query = $this->createQueryBuilder('u')->select('u')->where('u.date LIKE :date')
            ->setParameter('date', $now->format("Y-m-d")."%")
            ->getQuery();
        return $query->execute();
    }
}