<?php
/**
 * Created by PhpStorm.
 * User: RABAH Ismail
 * Date: 24/05/2017
 * Time: 10:45
 */
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class user_raRepository extends EntityRepository
{
    public function countByGwUserId($id = 0, $usertype = null)
    {
        $qb = $this->createQueryBuilder('u');
        $qb->select('count(u.id)');

        // if ($id != 0) {
        //   $qb->where('u.user_gw_id = :user_gw_id');
        //   $qb->setParameter('user_gw_id', $id  );
        // }

        if ($usertype != null) {
            $qb->andWhere('u.usertype = :usertype');
            $qb->setParameter('usertype', $usertype);
        } else {
            $qb->andWhere('u.usertype != :admin');
            $qb->setParameter('admin', 'admin');
        }

        return $qb->getQuery()->getSingleScalarResult();
    }
    //get all user id for one gw id
    public function findUsersIdsForGw($user_gw_id)
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u.p_a_pt_id')
            ->where('u.user_gw_id = :user_gw_id')
            ->setParameter('user_gw_id', $user_gw_id)
            ->getQuery();
        $data = $qb->getArrayResult();

        return $data;
    }
    /**
     *getAllIds()
     **/
    public function getAllIds($usertype = "all")
    {
        $qb = $this->createQueryBuilder('u');
        $qb->select('u.p_a_pt_id');
        if ($usertype != "all") {
            if ($usertype == "parent") {
                $qb->andWhere('u.usertype = :usertype');
                $qb->setParameter('usertype', "parent");
            } elseif ($usertype == "assmat") {
                $qb->andWhere('u.usertype = :usertype');
                $qb->setParameter('usertype', "assmat");
            } elseif ($usertype == "part") {
                $qb->andWhere('u.usertype = :usertype');
                $qb->setParameter('usertype', "part");
            } elseif ($usertype == "admin") {
                $qb->andWhere('u.usertype = :usertype');
                $qb->setParameter('usertype', "admin");
            }
        }
        $valeus = $qb->getQuery()->getScalarResult();
        $ids = null;
        $i = 0;
        foreach ($valeus as $value) {
            $ids[$i] = $value["p_a_pt_id"];
            $i++;
        }
        return $ids;
    }
    /**
     * checke if exists P_a_id in user table @ para  => $id : P_a_pt_id , $usertype : (parent ,assmat , part) , $gwid : grameweb id
     * @param $id
     * @param string $usertype
     * @param null $gwid
     * @return bool
     */
    public function existP_a_pt_Id($id, $usertype = "all", $gwid = null)
    {
        $qb = $this->createQueryBuilder('u');
        $qb->select('u.p_a_pt_id');
        $qb->where('u.p_a_pt_id = :p_a_pt_id');
        $qb->setParameter('p_a_pt_id', $id);
        if ($usertype != "all") {
            if ($usertype == "parent") {
                $qb->andWhere('u.usertype = :usertype');
                $qb->setParameter('usertype', "parent");
            } elseif ($usertype == "assmat") {
                $qb->andWhere('u.usertype = :usertype');
                $qb->setParameter('usertype', "assmat");
            } elseif ($usertype == "part") {
                $qb->andWhere('u.usertype = :usertype');
                $qb->setParameter('usertype', "part");
            }
        }
        $isIn = $qb->getQuery()->getScalarResult();
        if ($isIn == null)
            return false;
        else
            return true;
    }

    /**
     * @return mixed
     */
    public function findLast()
    {
        $qb = $this->createQueryBuilder('tc');
        $qb->setMaxResults(1);
        $qb->orderBy('tc.id', 'DESC');
        return $qb->getQuery()->getSingleResult();
    }

    /**
     * get all user id for one gw id
     * @param $user_gw_id
     * @return array
     */
    public function setNewParams($user_gw_id)
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u.p_a_pt_id')
            ->where('u.user_gw_id = :user_gw_id')
            ->setParameter('user_gw_id', $user_gw_id)
            ->getQuery();
        $data = $qb->getArrayResult();

        return $data;
    }
    /**
     * generate passeword withe specefice char length
     * length + int length + symbole length = TotaleLength
     *
     **/
    public function generateMdp($cahlength = 4, $intlength = 3, $symblength = 1)
    {
        $length = $cahlength;
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $length1 = $intlength;
        $characters1 = '0123456789';
        $characters1Length1 = strlen($characters1);
        $randomString1 = '';
        for ($i = 0; $i < $length1; $i++) {
            $randomString1 .= $characters1[rand(0, $characters1Length1 - 1)];
        }
        $length2 = $symblength;
        $characters2 = '!@#$%&*';
        $charactersL2ength2 = strlen($characters2);
        $randomString2 = '';
        for ($i = 0; $i < $length2; $i++) {
            $randomString2 .= $characters2[rand(0, $charactersL2ength2 - 1)];
        }

        $mdp[0] = $randomString[0];
        $mdp[1] = $randomString[1];
        $mdp[2] = $randomString1[0];
        $mdp[3] = $randomString[2];
        $mdp[4] = $randomString2[0];
        $mdp[5] = $randomString1[1];
        $mdp[6] = $randomString[3];
        $mdp[7] = $randomString1[2];

        return implode("", $mdp);
    }
    /**
     * Update list paramst for users how use old list params
     * @param $oldList
     * @param $newList
     * @return mixed
     */
    public function UpdateParamsList($oldList , $newList){
        $q = $this->createQueryBuilder('u')
            ->update()
            ->set('u.listparams' , '?1')
            ->where('u.listparams = ?2')
            ->setParameter(1 , $newList)
            ->setParameter(2 , $oldList)
            ->getQuery()
            ->execute();
        return $q;
    }
    /**
     * UpdateParamsList For All users by usertype
     * @param $usertype
     * @param $newsList
     * @return mixed
     */
    public function UpdateParamsListByUsertype( $usertype , $newsList){
        $q = $this->createQueryBuilder('u')
            ->update()
            ->set('u.listparams' , '?1')
            ->where('u.usertype = ?2')
            ->setParameter(1 , $newsList)
            ->setParameter(2 , $usertype)
            ->getQuery()
            ->execute();
        return $q;
    }
}