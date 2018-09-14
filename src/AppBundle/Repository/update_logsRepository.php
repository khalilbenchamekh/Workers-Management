<?php

namespace AppBundle\Repository;

/**
 * update_logsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class update_logsRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param $limit
     * @return array
     */
    public function getLateseByLimet($limit){
        return $this->createQueryBuilder('u')->select('u')->setMaxResults($limit)->orderBy('u.id','DESC')->getQuery()->getResult();
    }
    /**
     * @param string $Order
     * @param null $user_id
     * @return array
     */
    public function getAllByOrderByUser($Order = 'DESC' , $user_id = null){
        $query = $this->createQueryBuilder('u')->select('u');
        if($user_id != null)
            $query->where('u.userId = :user_id')->setParameter('user_id' , $user_id);
        return $query->orderBy('u.id',$Order)->getQuery()->getResult();
    }
}