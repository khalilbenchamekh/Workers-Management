<?php
/**
 * Created by PhpStorm.
 * User: RABAH Ismail
 * Date: 24/05/2017
 * Time: 10:45
 */
namespace AppBundle\Repository;
use Acme\DemoBundle\Dependency;
use Doctrine\ORM\EntityRepository;

class GwParentRepository extends EntityRepository
{
    public function countByGwUserId($id = 0 , $usertype = null)
	{
        $qb = $this->createQueryBuilder('u');
        $qb->select('count(u.id)');
        // if ( $id == 0) {
        $qb->Where('u.dateDemande > :dated');
        $qb->orWhere('u.dateDemande IS NULL');
        $qb->andwhere('u.archived != 1 ');
        $qb->setParameter('dated',  '2010-12-31' );
        // }
        return $qb->getQuery()->getSingleScalarResult();
	}
    /**
     * @return array
     * 	get parents withe condition (
     *  date de demant > 2010-12-31
     *  or
     *  parent hows are not archived in gramweb data base )
     */
    public function getparents()
    {
        $qb = $this->createQueryBuilder('u');
        $qb->select('u');
        // if ( $id == 0) {
//        $qb->where('u.statutparent != 8 ');
        $qb->Where('u.dateDemande > :dated');
        $qb->orWhere('u.dateDemande IS NULL');
        $qb->andwhere('u.archived != 1 ');
        $qb->setParameter('dated',  '2010-12-31' );
        // }
        return $qb->getQuery()->getResult();
    }
    public function findByGwUserId($id)
    {
        $qb = $this->createQueryBuilder('u');
        $qb->select('u');
        $qb->where('u.user = :user_id');
        $qb->setParameter('user_id', $id  );

        return $qb->getQuery()->getSingleScalarResult();
    }
    public function getinfos( $id )
	{
        $query = $this->createQueryBuilder('p')
        // ->select('p.id ,p.dateSaisie , p.dateDemande ,p.numFiche ,p.situationFamille ,p.statutFiche ,p.archived ,p.sendsms ,p.autorphoto,p.participeanim,p.sendmail,p.emailEnvoi,p.telEnvoi,p.telUrgence,p.relais.id ,p.relais_id ')
        ->where('p.id = :nl')
        ->setParameter('nl', $id )
        ->setMaxResults(1)
//        ->orderBy('p.id', 'ASC')
        ->getQuery();

       $data = $query->getResult();
       return $data[0];
	}
}