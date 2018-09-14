<?php

namespace AppBundle\Controller\Admin;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Parametre;
class ParentParamsController extends Controller
{
    /**
     * @Route("/Admin/parent/{id}/Para", name="user_paraparent")
     */
    public function UserParaParentAction(Request $request , $id)
    {
        $UsersRepo = $this->getDoctrine()->getRepository('AppBundle:user_ra', 'default');
        $listRepos = $this->getDoctrine()->getRepository('AppBundle:listparams', 'default');
        $emra = $this->get('doctrine')->getManager('default');
        $ra_user = $UsersRepo->findOneById($id);

        $isPredefend = $ra_user->getListparams() != null ? true : false ;
        $predefendListId = $isPredefend ? $ra_user->getListparams()->getId() : 0 ;
        $thisuserparams = $isPredefend ? $ra_user->getListparams()->getParameters() : $ra_user->getParameters() ;
        //get defaulte params for parent from ppf_config
        if($thisuserparams->count() == 0){
            $predefendListId = $this->getDoctrine()->getRepository('AppBundle:ppf_cofig', 'default')->findOneByTitle("para_list_id_parents")->getValue();
            $listedefo = $listRepos->findOneById($predefendListId);
            $isPredefend = true;
            $thisuserparams = $listedefo->getParameters();
            $ra_user->setListparams($listedefo);
        }
        $handlerpara = $request->get("appbundle_para_");
        //if has bei select a predifend lisat params
        if(isset($handlerpara["predefindpara"]) && isset($handlerpara["listpara"]) && $handlerpara["listpara"] != 0 ){
            $list = $listRepos->findOneById($handlerpara["listpara"]);
            $predefendListId = $handlerpara["listpara"];
            $ra_user->setListparams($list);
            $isPredefend = true;
            $thisuserparams = $list->getParameters();
            $this->removeParentParams($ra_user);                            //####
            $emra->persist($ra_user);
            $emra->flush();
        }else{
            //specaile param for this user
            if(isset($handlerpara)){
                //infoGenerale
                if($ra_user->getParameters()->count()  == 0){
                    $this->setParentParams($ra_user , $handlerpara );       //####
                }else{
                    $this->updateParentParams($ra_user , $handlerpara );    //####
                }
                $isPredefend = false;
                $thisuserparams = $ra_user->getParameters();
                $ra_user->setListparams(null);
                $emra->persist($ra_user);
                $emra->flush();
            }
        }
        $params2 = [];
        foreach ( $thisuserparams as $p){
            $params2[ $p->getColumnTitle()] = $p;
        }
        $sendtotemplat = [
            "predefiniPara" => $isPredefend,
            "predefendListId" => $predefendListId,
            "thisUserFiche" => $ra_user->getUsername(),
        ];
        return $this->render('adminPages/Parent/params.html.twig', [
                'params2' => $params2 ,
                'fromCtrl' => $sendtotemplat,
            ]
        );
    }
    /**
     * Set Parent Parms ( new collectio of params )
     * @param $ra_user
     * @param $handlerpara
     */
    public function setParentParams( $ra_user , $handlerpara ){
        $emra = $this->get('doctrine')->getManager('default');
        //pr_infogenerales
        $newpara = new Parametre();
        $newpara->setUsertype("parent");
        $newpara->setColumnTitle("pr_infogenerales");
        $newpara->setDispaly(isset( $handlerpara["infogeneselect"])? true : false);
        $newpara->setAllowUpdate(isset( $handlerpara["infogeneupdate"])? true : false );
        $emra->persist($newpara);
        $ra_user->addParameter($newpara);
        //respo1
        $newpara = new Parametre();
        $newpara->setUsertype("parent");
        $newpara->setColumnTitle("pr_respo1");
        $newpara->setDispaly(isset( $handlerpara["respo1select"])? true : false);
        $newpara->setAllowUpdate(isset( $handlerpara["respo1update"])? true : false );
        $emra->persist($newpara);
        $ra_user->addParameter($newpara);
        //respo2
        $newpara = new Parametre();
        $newpara->setUsertype("parent");
        $newpara->setColumnTitle("pr_respo2");
        $newpara->setDispaly(isset( $handlerpara["respo2select"])? true : false);
        $newpara->setAllowUpdate(isset( $handlerpara["respo2update"])? true : false );
        $emra->persist($newpara);
        $ra_user->addParameter($newpara);
        //pr_enfants
        $newpara = new Parametre();
        $newpara->setUsertype("parent");
        $newpara->setColumnTitle("pr_enfants");
        $newpara->setDispaly(isset( $handlerpara["enfantsselect"])? true : false);
        $newpara->setAllowUpdate(isset( $handlerpara["enfantsupdate"])? true : false );
        $emra->persist($newpara);
        $ra_user->addParameter($newpara);
        //pr_enfant_am
        $newpara = new Parametre();
        $newpara->setUsertype("parent");
        $newpara->setColumnTitle("pr_enfant_am");
        $newpara->setDispaly(isset( $handlerpara["enfamselect"])? true : false);
        $newpara->setAllowUpdate(isset( $handlerpara["enfamupdate"])? true : false );
        $newpara->setAllowDelete(isset( $handlerpara["enfamdelete"])? true : false );
        $emra->persist($newpara);
        $ra_user->addParameter($newpara);
        //pr_agenda
        $newpara = new Parametre();
        $newpara->setUsertype("parent");
        $newpara->setColumnTitle("pr_agenda");
        $newpara->setDispaly(isset( $handlerpara["agendaselect"])? true : false);
        $newpara->setAllowInsert(isset( $handlerpara["agendasinin"])? true : false );
        $emra->persist($newpara);
        $ra_user->addParameter($newpara);
        //pr_agenda_enfants
        $newpara = new Parametre();
        $newpara->setUsertype("parent");
        $newpara->setColumnTitle("pr_agenda_enfants");
        $newpara->setAllowInsert(isset( $handlerpara["agendasininforchild"])? true : false );
        $emra->persist($newpara);
        $ra_user->addParameter($newpara);
        //pr_agenda_insc
        $newpara = new Parametre();
        $newpara->setUsertype("parent");
        $newpara->setColumnTitle("pr_agenda_insc");
        $newpara->setDispaly(isset( $handlerpara["reselistselect"])? true : false );
        $newpara->setAllowDelete(isset( $handlerpara["reselistdelete"])? true : false );
        $emra->persist($newpara);
        $ra_user->addParameter($newpara);
        //pr_downlond_doc
        $newpara = new Parametre();
        $newpara->setUsertype("parent");
        $newpara->setColumnTitle("pr_downlond_doc");
        $newpara->setDispaly(isset( $handlerpara["allowdownlond"])? true : false );
        $emra->persist($newpara);
        $ra_user->addParameter($newpara);
    }
    /**
     * Update Parent Params
     * @param $ra_user
     * @param $handlerpara
     */
    public function updateParentParams( $ra_user , $handlerpara ){
        foreach ( $ra_user->getParameters() as $p){
            if($p->getColumnTitle() == "pr_infogenerales"){
                $p->setDispaly(isset( $handlerpara["infogeneselect"])? true : false );
                $p->setAllowUpdate(isset( $handlerpara["infogeneupdate"])? true : false );
            }else  if($p->getColumnTitle() == "pr_respo1"){
                $p->setDispaly(isset( $handlerpara["respo1select"])? true : false );
                $p->setAllowUpdate(isset( $handlerpara["respo1update"])? true : false );
            }
            else  if($p->getColumnTitle() == "pr_respo2"){
                $p->setDispaly(isset( $handlerpara["respo2select"])? true : false );
                $p->setAllowUpdate(isset( $handlerpara["respo2update"])? true : false );
            }
            else  if($p->getColumnTitle() == "pr_enfants"){
                $p->setDispaly(isset( $handlerpara["enfantsselect"])? true : false );
                $p->setAllowUpdate(isset( $handlerpara["enfantsupdate"])? true : false );
            }
            else  if($p->getColumnTitle() == "pr_enfant_am"){
                $p->setDispaly(isset( $handlerpara["enfamselect"])? true : false );
                $p->setAllowUpdate(isset( $handlerpara["enfamupdate"])? true : false );
                $p->setAllowDelete(isset( $handlerpara["enfamdelete"])? true : false );
            }
            else  if($p->getColumnTitle() == "pr_agenda"){
                $p->setDispaly(isset( $handlerpara["agendaselect"])? true : false );
                $p->setAllowInsert(isset( $handlerpara["agendasinin"])? true : false );
            }
            else  if($p->getColumnTitle() == "pr_agenda_enfants"){
                $p->setAllowInsert(isset( $handlerpara["agendasininforchild"])? true : false );
            }
            else  if($p->getColumnTitle() == "pr_agenda_insc"){
                $p->setDispaly(isset( $handlerpara["reselistselect"])? true : false );
                $p->setAllowDelete(isset( $handlerpara["reselistdelete"])? true : false );
            }
            else  if($p->getColumnTitle() == "pr_downlond_doc"){
                $p->setDispaly(isset( $handlerpara["allowdownlond"])? true : false );
            }
        }
    }

    /**
     * Remove Parent Paramese
     * @param $ra_user
     */
    public function removeParentParams( $ra_user ){
        $emra = $this->get('doctrine')->getManager('default');
        foreach ($ra_user->getParameters() as $p ){
            $emra->remove($p);
        }
    }
}
