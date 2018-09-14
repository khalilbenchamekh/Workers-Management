<?php
/**
 * Created by PhpStorm.
 * User: RABAH Ismail
 * Date: 24/05/2017
 * Time: 10:45
 */
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class GwPartenaireRepository extends EntityRepository
{
    public function countByGwUserId($id = 0, $usertype = null)
	{

        $qb = $this->createQueryBuilder('u');
        $qb->select('count(u.id)');
        // $qb->where('u.user = :user_id');
        // $qb->setParameter('user_id', $id  );

        return $qb->getQuery()->getSingleScalarResult();
	}
    
}