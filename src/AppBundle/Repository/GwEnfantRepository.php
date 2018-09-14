<?php
/**
 * Created by PhpStorm.
 * User: DeveloppeurWeb
 * Date: 24/05/2017
 * Time: 14:37
 */
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class GwEnfantRepository extends EntityRepository
{
    //get all Enfant for one parent using parent id
    public function getEnfantFor($parent_id)
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.parant = :parant_id')
            ->setParameter('parant_id', $parent_id)
            ->getQuery();
        $data = $qb->getArrayResult();
        return $data;
    }
}