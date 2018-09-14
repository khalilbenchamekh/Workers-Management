<?php
/**
 * Created by PhpStorm.
 * User: RABAH Ismail
 * Date: 24/05/2017
 * Time: 10:45
 */
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class GwDocumentsRepository extends EntityRepository
{
    public function getLast5($ids)
	{

		// $query = $em->createQuery('SELECT m FROM MyTable m WHERE m.id IN(12, 10)');

        // $qb = $this->createQueryBuilder('u');
        // $qb->select();
        // $qb->where('u.id in :parentsid');
        // $qb->setParameter('parentsid', $ids  );


  //       $qb = $this->createQueryBuilder('m');
		// $qb->select();
		// $qb->where($qb->expr()->in('m.id', $ids ));

        $queryBuilder = $this->createQueryBuilder()
	      ->select('a')
	      ->from($this->_entityName, 'a')
	      ->where($qb->expr()->in('m.id', $ids ))
	    ;

        // $DocsRepo = $this->getDoctrine()->getRepository('AppBundle:GwDocuments','gramweb')->findBy(
        //     array('id' => $thisParents ),
        //     array('id' =>'ASC')
        // );
       $data = $queryBuilder->getQuery()->getSingleScalarResult();
    	return $data; 
	}
}