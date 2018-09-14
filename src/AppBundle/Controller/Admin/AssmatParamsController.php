<?php

namespace AppBundle\Controller\Admin;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Parametre;

class AssmatParamsController extends Controller
{

    /**
     * @Route("/Admin/assmat/{id}/Para", name="user_paraassmat")
     */
    public function UserParaAssmatAction(Request $request , $id)
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
            $predefendListId = $this->getDoctrine()->getRepository('AppBundle:ppf_cofig', 'default')->findOneByTitle("para_list_id_assmats")->getValue();
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
            $this->removeAssmatParams($ra_user);                            //####
            $emra->persist($ra_user);
            $emra->flush();
        }else{
            //specaile param for this user
            if(isset($handlerpara)){
                //infoGenerale
                if($ra_user->getParameters()->count()  == 0){
                    $this->setAssmatParams($ra_user , $handlerpara );       //####
                }else{
                    $this->updateAssmatParams($ra_user , $handlerpara );    //####
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
        return $this->render('adminPages/Assmat/params.html.twig', [
                'params2' => $params2 ,
                'fromCtrl' => $sendtotemplat,
            ]
        );
    }

    /**
     * SetAssmatParams
     * @param $ra_user
     * @param $handlerpara
     */
    public function setAssmatParams( $ra_user , $handlerpara){
        $emra = $this->get('doctrine')->getManager('default');
        //am_infogenerales
        $newpara = new Parametre();
        $newpara->setUsertype("assmat");
        $newpara->setColumnTitle("am_infogenerales");
        $newpara->setDispaly(isset( $handlerpara["infogeneselect"])? true : false);
        $newpara->setAllowUpdate(isset( $handlerpara["infogeneupdate"])? true : false );
        $emra->persist($newpara);
        $ra_user->addParameter($newpara);
        //am_agrements
        $newpara = new Parametre();
        $newpara->setUsertype("assmat");
        $newpara->setColumnTitle("am_agrements");
        $newpara->setDispaly(isset( $handlerpara["am_agrements"])? true : false);
        $newpara->setAllowUpdate(isset( $handlerpara["am_agrementsupdate"])? true : false );
        $newpara->setAllowDelete(isset( $handlerpara["am_agrementsdelete"])? true : false );
        $emra->persist($newpara);
        $ra_user->addParameter($newpara);
        //am_mesenfant_am
        $newpara = new Parametre();
        $newpara->setUsertype("assmat");
        $newpara->setColumnTitle("am_mesenfant_am");
        $newpara->setDispaly(isset( $handlerpara["mesenfamselect"])? true : false);
        $newpara->setAllowUpdate(isset( $handlerpara["mesenfamupdate"])? true : false );
        $newpara->setAllowDelete(isset( $handlerpara["mesenfamdelete"])? true : false );
        $emra->persist($newpara);
        $newList->addParameter($newpara);
        //am_enfant_am
        $newpara = new Parametre();
        $newpara->setUsertype("assmat");
        $newpara->setColumnTitle("am_enfant_am");
        $newpara->setDispaly(isset( $handlerpara["enfamselect"])? true : false);
        $newpara->setAllowUpdate(isset( $handlerpara["enfamupdate"])? true : false );
        $newpara->setAllowDelete(isset( $handlerpara["enfamdelete"])? true : false );
        $emra->persist($newpara);
        $ra_user->addParameter($newpara);
        //am_agenda
        $newpara = new Parametre();
        $newpara->setUsertype("assmat");
        $newpara->setColumnTitle("am_agenda");
        $newpara->setDispaly(isset( $handlerpara["agendaselect"])? true : false);
        $newpara->setAllowInsert(isset( $handlerpara["agendasinin"])? true : false );
        $emra->persist($newpara);
        $ra_user->addParameter($newpara);
        //am_agenda_enfants
        $newpara = new Parametre();
        $newpara->setUsertype("assmat");
        $newpara->setColumnTitle("am_agenda_enfants");
        $newpara->setAllowInsert(isset( $handlerpara["agendasininforchild"])? true : false );
        $emra->persist($newpara);
        $ra_user->addParameter($newpara);
        //am_agenda_insc
        $newpara = new Parametre();
        $newpara->setUsertype("assmat");
        $newpara->setColumnTitle("am_agenda_insc");
        $newpara->setDispaly(isset( $handlerpara["reselistselect"])? true : false );
        $newpara->setAllowDelete(isset( $handlerpara["reselistdelete"])? true : false );
        $emra->persist($newpara);
        $ra_user->addParameter($newpara);
        //am_downlond_doc
        $newpara = new Parametre();
        $newpara->setUsertype("assmat");
        $newpara->setColumnTitle("am_downlond_doc");
        $newpara->setDispaly(isset( $handlerpara["allowdownlond"])? true : false );
        $emra->persist($newpara);
        $ra_user->addParameter($newpara);
    }

    /**
     * UpdateAssmatParams
     * @param $ra_user
     * @param $handlerpara
     */
    public function updateAssmatParams($ra_user , $handlerpara){
        foreach ( $ra_user->getParameters() as $p){
            if($p->getColumnTitle() == "am_infogenerales"){
                $p->setDispaly(isset( $handlerpara["infogeneselect"])? true : false );
                $p->setAllowUpdate(isset( $handlerpara["infogeneupdate"])? true : false );
            }
            else  if($p->getColumnTitle() == "am_agrements"){
                $p->setDispaly(isset( $handlerpara["am_agrements"])? true : false );
                $p->setAllowUpdate(isset( $handlerpara["am_agrementsupdate"])? true : false );
                $p->setAllowDelete(isset( $handlerpara["am_agrementsdelete"])? true : false );
            }
            else  if($p->getColumnTitle() == "am_mesenfant_am"){
                $p->setDispaly(isset( $handlerpara["mesenfamselect"])? true : false );
                $p->setAllowUpdate(isset( $handlerpara["mesenfamupdate"])? true : false );
                $p->setAllowDelete(isset( $handlerpara["mesenfamdelete"])? true : false );
            }
            else  if($p->getColumnTitle() == "am_enfant_am"){
                $p->setDispaly(isset( $handlerpara["enfamselect"])? true : false );
                $p->setAllowUpdate(isset( $handlerpara["enfamupdate"])? true : false );
                $p->setAllowDelete(isset( $handlerpara["enfamdelete"])? true : false );
            }
            else  if($p->getColumnTitle() == "am_agenda"){
                $p->setDispaly(isset( $handlerpara["agendaselect"])? true : false );
                $p->setAllowInsert(isset( $handlerpara["agendasinin"])? true : false );
            }
            else  if($p->getColumnTitle() == "am_agenda_enfants"){
                $p->setAllowInsert(isset( $handlerpara["agendasininforchild"])? true : false );
            }
            else  if($p->getColumnTitle() == "am_agenda_insc"){
                $p->setDispaly(isset( $handlerpara["reselistselect"])? true : false );
                $p->setAllowDelete(isset( $handlerpara["reselistdelete"])? true : false );
            }
            else  if($p->getColumnTitle() == "am_downlond_doc"){
                $p->setDispaly(isset( $handlerpara["allowdownlond"])? true : false );
            }
        }
    }

    /**
     * RemoveAssmatParams
     * @param $ra_user
     */
    public function removeAssmatParams($ra_user){
        $emra = $this->get('doctrine')->getManager('default');
        foreach ($ra_user->getParameters() as $p ){
            $emra->remove($p);
        }
    }

}
