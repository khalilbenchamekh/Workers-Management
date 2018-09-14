<?php
/**
 * Created by PhpStorm.
 * User: RABAH Ismail
 * Date: 13/06/2017
 * Time: 12:51
 */

namespace AppBundle\Service;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\GwResponsable1;
use AppBundle\Entity\GwParent;

class User_raService
{
    protected $em;
    public function __construct(EntityManager $entityManager,EntityManager $emgw)
    {
        $this->em = $entityManager;
        $this->emgw = $emgw;
    }
    //get Predefind Paramitres list
    public function getPredefindPars( $userType , $crntListId = null){
        $paralist = $this->em->getRepository('AppBundle:listparams', 'gramweb')->findByUsertype($userType);
        if($crntListId == null ){
            if( $userType == "parent"){
                $crntListId = $this->em->getRepository('AppBundle:ppf_cofig', 'default')->findOneByTitle("para_list_id_parents")->getValue();
            }elseif ( $userType == "assmat"){
                $crntListId = $this->em->getRepository('AppBundle:ppf_cofig', 'default')->findOneByTitle("para_list_id_assmats")->getValue();
            }
        }
        $select = '<option value="0">-- Choisir paramétrage --</option>';
        foreach ($paralist as $p ){
            $select .= '<option value="'. $p->getId() .'" '.( $crntListId == $p->getId() ? 'selected="selected"' : ''  )  .' >'. $p->getParaColection() .'</option>';
        }
        return $select;
    }
    /**
     * isAllowedTo check parametres for this user
     * @param string $para
     * @return bool
     */
    public function isAllowedTo($para){


        return true;
    }
    //get assmat Agrements By am Id
    public function getAgremets( $amid ){
        $ags = $this->em->getRepository('AppBundle:GwAgrement', 'gramweb')->findByAssmat($amid);
        $data = [];
        $vnom = "";
        foreach ( $ags as $ag){
            $vnom = $ag->getNom() != null ? $ag->getNom()->getNom(): "";
            $data[] = [
                'id' => $ag->getId(),
                'name' => $vnom ,
            ];
        }
        return $data;
    }
    /**
     * @param $usertype
     * @param null $limit
     * @return array
     */
    public function getUsersOfType( $usertype , $limit = null ){
//        $users = $this->em->getRepository( 'AppBundle:user_ra' , 'default')->findByUsertype($usertype);
        $usersRepos = $this->em->getRepository( 'AppBundle:user_ra' , 'default');
        $data = [];
        $qb = $usersRepos->createQueryBuilder('u')
            ->select('u.id , u.username , u.p_a_pt_id')
            ->where('u.usertype = :usertype')
            ->setParameter('usertype', $usertype )
            ->getQuery();
        $isParent = $usertype == "parent" ? true :false;
        $isAssmat = $usertype == "assmat" ? true :false;
        $isPart = $usertype == "part" ? true :false;
        $users = $qb->getResult();
        foreach ($users as $usr) {
            $pid = intval($usr['p_a_pt_id']);
            if($isParent){
                $Parnet = $this->getResposNams($pid);
                $data[]= [
                    'id' => $usr['id'],
                    'username' => $usr['username'],
                    'gwid' => $pid,
                    'name' => $Parnet['nam1'] ." ". $Parnet['pre1'],
                    'pre' => $Parnet['nam2'] ." ". $Parnet['pre2'],
                ];
            }else if( $isAssmat ){
                $am = $this->getAmNam($pid);
                $data[]= [
                    'id' => $usr['id'],
                    'username' => $usr['username'],
                    'gwid' => $pid,
                    'name' => $am['nam'],
                    'pre' => $am['pre']
                ];
            }else if( $isPart ){
                $part = $this->getPartNam($pid);
                $data[]= [
                    'id' => $usr['id'],
                    'username' => $usr['username'],
                    'gwid' => $pid,
                    'name' => $part['nam'],
                    'pre' => $part['pre']
                ];
            }
        }
        return $data;
    }
    /**
     * @param $amid
     * @return array
     */
    public function getAmNam($amid){
        $am = $this->emgw->getRepository('AppBundle:GwAm','gramweb')->findOneById($amid);
        $nams = [
            'nam' => $am->getNomNaissance() != "" ? $am->getNomNaissance() : "",
            'pre' => $am->getPrenomNaissance() != "" ? $am->getPrenomNaissance() : "",
        ];
        return $nams;
    }
    /**
     * @param $partId
     * @return array
     */
    public function getPartNam($partId){
        $part = $this->emgw->getRepository('AppBundle:GwPartenaire' , 'gramweb')->findOneById($partId);
        $nams=[
            'nam' => $part->getNom() != "" ? $part->getNom() : "",
            'pre' => $part->getPrenom() != "" ? $part->getPrenom() : ""
        ];
        return $nams;
    }
    /**
     * get les des responsable de famille
     * @param $userid
     * @return array
     */
    public function getResposNams( $userid){
        $Parnet = $this->emgw->getRepository('AppBundle:GwParent', 'gramweb')
            ->createQueryBuilder('p')
            ->select('p1.id , ro.nom as nam1, ro.prenom as pre1 , rt.nom as nam2 , rt.prenom as pre2 ')
            ->from('AppBundle:GwParent' ,'p1')
            ->innerJoin('p1.responsable1','ro')
            ->innerJoin('p1.responsable2','rt')
            ->where('p1.id = :user_id')
            ->setParameter('user_id', $userid)
            ->andWhere('p.id = :user_id')
            ->setParameter('user_id', $userid)
            ->getQuery()
            ->getArrayResult();
        reset($Parnet);
        $Parnet2 = current($Parnet);
        $nams = [
            'nam1' => $Parnet2['nam1'],
            'pre1' => $Parnet2['pre1'],
            'nam2' => $Parnet2['nam2'],
            'pre2' => $Parnet2['pre2']
        ];
        return $nams;
    }
    /**
     * get Users HTML Rows
     * @param $usertype
     * @return string
     */
    public function getUsersHTMLRows($usertype  , $ids ){
        $usersRepos = $this->em->getRepository( 'AppBundle:user_ra' , 'default');
        $Rows = "";
        $qb = $usersRepos->createQueryBuilder('u')
            ->select('u.id , u.username , u.p_a_pt_id')
            ->where('u.usertype = :usertype')
            ->setParameter('usertype', $usertype )
            ->andWhere(' u.id in ('.$ids.')')
            ->getQuery();
        $isParent = $usertype == "parent" ? true :false;
        $isAssmat = $usertype == "assmat" ? true :false;
        $isPart = $usertype == "part" ? true :false;
        $users = $qb->getResult();
        if($isParent){
            foreach ( $users as $usr){
                $gwid = $usr['p_a_pt_id'];
                $Parnet = $this->getResposNams($gwid);
                $Rows .= '<tr class="myrow">'
//                    .'<span class="col-lg-1 col-md-1 col-sm-1" >'.$gwid.'</span>'
//                    .'<span class="col-lg-3 col-md-3 col-sm-3" >'.$usr["username"].' </span>'
//                    .'<span class="col-lg-4 col-md-4 col-sm-4" >'.$Parnet['nam1'] ." ". $Parnet['pre1'].'</span>'
//                    .'<span class="col-lg-4 col-md-4 col-sm-4" >'.$Parnet['nam2'] ." ". $Parnet['pre2'].' </span>'
                    .'<td class="col-lg-1 col-md-1 col-sm-1">'.$gwid.'</td>'
                    .'<td class="col-lg-3 col-md-3 col-sm-3">'.$usr["username"].'</td>'
                    .'<td class="col-lg-4 col-md-4 col-sm-4">'.$Parnet['nam1'] ." ". $Parnet['pre1'].'</td>'
                    .'<td class="col-lg-4 col-md-4 col-sm-4">'.$Parnet['nam2'] ." ". $Parnet['pre2'].'</td>'
                    .' </tr>';
            }
        }else if($isAssmat){
            foreach ( $users as $usr){
                $gwid = $usr['p_a_pt_id'];
                $am = $this->getAmNam($gwid);
                $Rows .= '<tr class="myrow">'
                    .'<td class="col-lg-1 col-md-1 col-sm-1" >'.$gwid.'</td>'
                    .'<td class="col-lg-3 col-md-3 col-sm-3" >'.$usr["username"].' </td>'
                    .'<td class="col-lg-4 col-md-4 col-sm-4" >'.$am['nam'] .'</td>'
                    .'<td class="col-lg-4 col-md-4 col-sm-4" >'.$am['pre'] .' </td>'
                    .' </tr>';
            }
        }else if($isPart){
            foreach ( $users as $usr){
                $gwid = $usr['p_a_pt_id'];
                $part = $this->getPartNam($gwid);
                $Rows .= '<tr class="myrow">'
                    .'<td class="col-lg-1 col-md-1 col-sm-1" >'.$gwid.'</td>'
                    .'<td class="col-lg-3 col-md-3 col-sm-3" >'.$usr["username"].' </td>'
                    .'<td class="col-lg-4 col-md-4 col-sm-4" >'.$part['nam'] .'</td>'
                    .'<td class="col-lg-4 col-md-4 col-sm-4" >'.$part['pre'] .' </td>'
                    .' </tr>';
            }
        }
        return $Rows;
    }
    /**
     * Get Configaration Values By Title
     * @param $title
     * @return mixed
     */
    public function getConfig($title){
        return $this->em->getRepository('AppBundle:ppf_cofig' ,'default')->findOneByTitle($title)->getValue();
    }
}