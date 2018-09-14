<?php

namespace AppBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Parametre;
use AppBundle\Entity\listparams;
use Symfony\Component\HttpFoundation\JsonResponse;

class ParamsController extends Controller
{
    /**
     * @Route("/Admin/Para/", name="Admin_Para" )
     * @Route("/Admin/Para/{tab}", name="Admin_Para_settab" , defaults={"tab" = "parent"})
     */
    public function AdminParaAction($tab = "parent" )
    {
        $emra = $this->get('doctrine')->getManager('default');
        $configRepos = $emra->getRepository('AppBundle:ppf_cofig', 'default');
        $defaultParntsParaId = $configRepos->findOneByTitle("para_list_id_parents")->getValue();
        $defaultAssmatParaId = $configRepos->findOneByTitle("para_list_id_assmats")->getValue();

        $sednTotemp = [
            'defaultParntsParaId' => $defaultParntsParaId ,
            'defaultAssmatParaId' => $defaultAssmatParaId ,
            'tab'            => $tab,
        ];
        return $this->render('adminPages/ParaView.html.twig', ["getFromCtrl" => $sednTotemp]);
    }
    /**
     * @Route("/Admin/Paratodo/Parents" , name="params_parents")
     */
    public function ParentsParamAction(Request $request){
        $emra = $this->get('doctrine')->getManager('default');
        $listRepos = $this->getDoctrine()->getRepository('AppBundle:listparams', 'default');
        $DefaultParentParams = $emra->getRepository('AppBundle:ppf_cofig', 'default')->findOneByTitle("para_list_id_parents");
        $handlerpara = $request->get("appbundle_para_");
        if (isset($handlerpara)){
            //insert new list params
            if(isset($handlerpara['parentaction']) && intval($handlerpara['parentaction']) != 0 )
            {
                $id = $this->setParentsParams( $handlerpara['new_list_para_parent'] , $handlerpara);
//                $DefaultParentParams->setValue($id);
                $emra->flush();
            }else{
                //Update Params
                //get Selected list params id
                $selsctListId = intval($handlerpara['list_para_parent']);
                if($selsctListId != 0 ){
                    $list_para = $listRepos->findOneById($selsctListId);
                    $this->updateParentsParams( $list_para , $handlerpara );
                    if(isset($handlerpara['setParamsForParent'])){
                        $setTo = $handlerpara['setParamsForParent'];
                        if ($setTo == 'justForDefault'){
                            $emra->getRepository('AppBundle:user_ra' ,'default')->UpdateParamsList($DefaultParentParams->getValue() , $selsctListId);
                            $DefaultParentParams->setValue($selsctListId);
                            $emra->flush();
                        }else if ($setTo == 'setToAllUser'){
//                            $userReposotory = $emra->getRepository('AppBundle:user_ra','default')->DeletAllParamByUserType('parent');
                            $statement = $emra->getConnection()->prepare("select DISTINCT u.id from user_ra u join users_parametres up on u.id = up.user_ra_id join parametre p on up.parametre_id = p.id where u.usertype = 'parent'");
                            $statement->execute();
                            $results = $statement->fetchAll();
                            $ids =[];
                            foreach ($results as $u ){
                                $ids[]= $u['id'];
                            }
                            $user = $emra->getRepository('AppBundle:user_ra' ,'default')->findById($ids);
                            foreach ($user as $u ){
                                foreach ($u->getParameters() as $p){
                                    $emra->remove($p);
                                }
                            }
                            $emra->getRepository('AppBundle:user_ra' ,'default')->UpdateParamsListByUsertype('parent' , $selsctListId);
                            $DefaultParentParams->setValue($selsctListId);
                            $emra->flush();
                        }
                    }
                }
            }
        }
        return $this->redirect( $this->generateUrl('Admin_Para' ));
    }

    /**
     * setParentsParams
     * @param $title
     * @param $handlerpara
     * @return int
     */
    public function setParentsParams( $title , $handlerpara){
        $emra = $this->get('doctrine')->getManager('default');
        $newList = new listparams();
        $newList->setTitle($title);
        $newList->setParaColection($title);
        $newList->setUsertype('parent');
        $emra->persist($newList);
        //pr_infogenerales
        $newpara = new Parametre();
        $newpara->setUsertype("parent");
        $newpara->setColumnTitle("pr_infogenerales");
        $newpara->setDispaly(isset( $handlerpara["infogeneselect"])? true : false);
        $newpara->setAllowUpdate(isset( $handlerpara["infogeneupdate"])? true : false );
        $emra->persist($newpara);
        $newList->addParameter($newpara);
        //respo1
        $newpara = new Parametre();
        $newpara->setUsertype("parent");
        $newpara->setColumnTitle("pr_respo1");
        $newpara->setDispaly(isset( $handlerpara["respo1select"])? true : false);
        $newpara->setAllowUpdate(isset( $handlerpara["respo1update"])? true : false );
        $emra->persist($newpara);
        $newList->addParameter($newpara);
        //respo2
        $newpara = new Parametre();
        $newpara->setUsertype("parent");
        $newpara->setColumnTitle("pr_respo2");
        $newpara->setDispaly(isset( $handlerpara["respo2select"])? true : false);
        $newpara->setAllowUpdate(isset( $handlerpara["respo2update"])? true : false );
        $emra->persist($newpara);
        $newList->addParameter($newpara);
        //pr_enfants
        $newpara = new Parametre();
        $newpara->setUsertype("parent");
        $newpara->setColumnTitle("pr_enfants");
        $newpara->setDispaly(isset( $handlerpara["enfantsselect"])? true : false);
        $newpara->setAllowUpdate(isset( $handlerpara["enfantsupdate"])? true : false );
        $emra->persist($newpara);
        $newList->addParameter($newpara);
        //pr_enfant_am
        $newpara = new Parametre();
        $newpara->setUsertype("parent");
        $newpara->setColumnTitle("pr_enfant_am");
        $newpara->setDispaly(isset( $handlerpara["enfamselect"])? true : false);
        $newpara->setAllowUpdate(isset( $handlerpara["enfamupdate"])? true : false );
        $newpara->setAllowDelete(isset( $handlerpara["enfamdelete"])? true : false );
        $emra->persist($newpara);
        $newList->addParameter($newpara);
        //pr_agenda
        $newpara = new Parametre();
        $newpara->setUsertype("parent");
        $newpara->setColumnTitle("pr_agenda");
        $newpara->setDispaly(isset( $handlerpara["agendaselect"])? true : false);
        $newpara->setAllowInsert(isset( $handlerpara["agendasinin"])? true : false );
        $emra->persist($newpara);
        $newList->addParameter($newpara);
        //pr_agenda_enfants
        $newpara = new Parametre();
        $newpara->setUsertype("parent");
        $newpara->setColumnTitle("pr_agenda_enfants");
        $newpara->setAllowInsert(isset( $handlerpara["agendasininforchild"])? true : false );
        $emra->persist($newpara);
        $newList->addParameter($newpara);
        //pr_agenda_insc
        $newpara = new Parametre();
        $newpara->setUsertype("parent");
        $newpara->setColumnTitle("pr_agenda_insc");
        $newpara->setDispaly(isset( $handlerpara["reselistselect"])? true : false );
        $newpara->setAllowDelete(isset( $handlerpara["reselistdelete"])? true : false );
        $emra->persist($newpara);
        $newList->addParameter($newpara);
        //pr_downlond_doc
        $newpara = new Parametre();
        $newpara->setUsertype("parent");
        $newpara->setColumnTitle("pr_downlond_doc");
        $newpara->setDispaly(isset( $handlerpara["allowdownlond"])? true : false );
        $emra->persist($newpara);
        $newList->addParameter($newpara);
        $emra->flush();
        return $newList->getId();
    }
    /**
     * Update Parent Params
     * @param $list_para
     * @param $handlerpara
     */
    public function updateParentsParams( $list_para , $handlerpara ){
        foreach ( $list_para->getParameters() as $p){
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
     * @Route("/Admin/Paratodo/Assmats" , name="params_assmats")
     */
    public function AssmatsParamAction(Request $request){
        $emra = $this->get('doctrine')->getManager('default');
        $listRepos = $this->getDoctrine()->getRepository('AppBundle:listparams', 'default');

        $DefaultAssmatsParams = $emra->getRepository('AppBundle:ppf_cofig', 'default')->findOneByTitle("para_list_id_assmats");

        $handlerpara = $request->get("appbundle_para_");
        if (isset($handlerpara)){
            //insert new list params
            if(isset($handlerpara['assmataction']) && intval($handlerpara['assmataction']) != 0 )
            {
                $id = $this->setAssmatsParams( $handlerpara['new_list_para_assmat'] , $handlerpara);
//                $DefaultAssmatsParams->setValue($id);
                $emra->flush();
            }else{
                //Update Params
                //get Selected list params id
                $selsctListId = intval($handlerpara['list_para_assmat']);
                if($selsctListId != 0 ){
                    $list_para = $listRepos->findOneById($selsctListId);
                    $this->updateAssmatsParams( $list_para , $handlerpara );
                    if(isset($handlerpara['setParamsForAm'])){
                        $setTo = $handlerpara['setParamsForAm'];
                        if ($setTo == 'justForDefault'){
                            $emra->getRepository('AppBundle:user_ra' ,'default')->UpdateParamsList($DefaultAssmatsParams->getValue() , $selsctListId);
                            $DefaultAssmatsParams->setValue($selsctListId);
                            $emra->flush();
                        }else if ($setTo == 'setToAllUser'){
                            $statement = $emra->getConnection()->prepare("select DISTINCT u.id from user_ra u join users_parametres up on u.id = up.user_ra_id join parametre p on up.parametre_id = p.id where u.usertype = 'assmat'");
                            $statement->execute();
                            $results = $statement->fetchAll();
                            $ids =[];
                            foreach ($results as $u ){
                                $ids[]= $u['id'];
                            }
                            $user = $emra->getRepository('AppBundle:user_ra' ,'default')->findById($ids);
                            foreach ($user as $u ){
                                foreach ($u->getParameters() as $p){
                                    $emra->remove($p);
                                }
                            }
                            $emra->getRepository('AppBundle:user_ra' ,'default')->UpdateParamsListByUsertype('assmat' , $selsctListId);
                            $DefaultAssmatsParams->setValue($selsctListId);
                            $emra->flush();
                        }
                    }
                }
            }
        }
        return $this->redirect( $this->generateUrl('Admin_Para_settab' , [ "tab" => "assmat"] ));
    }
    /**
     * SetAssmatParams new Assmats list params
     * @param $title
     * @param $handlerpara
     * @return int
     */
    public function setAssmatsParams( $title , $handlerpara){
        $emra = $this->get('doctrine')->getManager('default');
        $newList = new listparams();
        $newList->setTitle($title);
        $newList->setParaColection($title);
        $newList->setUsertype('assmat');
        $emra->persist($newList);
        //am_infogenerales
        $newpara = new Parametre();
        $newpara->setUsertype("assmat");
        $newpara->setColumnTitle("am_infogenerales");
        $newpara->setDispaly(isset( $handlerpara["infoamselect"])? true : false);
        $newpara->setAllowUpdate(isset( $handlerpara["infoamupdate"])? true : false );
        $emra->persist($newpara);
        $newList->addParameter($newpara);
        //am_agrements
        $newpara = new Parametre();
        $newpara->setUsertype("assmat");
        $newpara->setColumnTitle("am_agrements");
        $newpara->setDispaly(isset( $handlerpara["agreselect"])? true : false);
        $newpara->setAllowUpdate(isset( $handlerpara["agreupdate"])? true : false );
        $newpara->setAllowDelete(isset( $handlerpara["agredelete"])? true : false );
        $emra->persist($newpara);
        $newList->addParameter($newpara);
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
        $newpara->setDispaly(isset( $handlerpara["amenfselect"])? true : false);
        $newpara->setAllowUpdate(isset( $handlerpara["amenfupdate"])? true : false );
        $newpara->setAllowDelete(isset( $handlerpara["amenfdelete"])? true : false );
        $emra->persist($newpara);
        $newList->addParameter($newpara);
        //am_agenda
        $newpara = new Parametre();
        $newpara->setUsertype("assmat");
        $newpara->setColumnTitle("am_agenda");
        $newpara->setDispaly(isset( $handlerpara["amagendaselect"])? true : false);
        $newpara->setAllowInsert(isset( $handlerpara["amagendasinin"])? true : false );
        $emra->persist($newpara);
        $newList->addParameter($newpara);
        //am_agenda_enfants
        $newpara = new Parametre();
        $newpara->setUsertype("assmat");
        $newpara->setColumnTitle("am_agenda_enfants");
        $newpara->setAllowInsert(isset( $handlerpara["amagendasininforchild"])? true : false );
        $emra->persist($newpara);
        $newList->addParameter($newpara);
        //am_agenda_insc
        $newpara = new Parametre();
        $newpara->setUsertype("assmat");
        $newpara->setColumnTitle("am_agenda_insc");
        $newpara->setDispaly(isset( $handlerpara["amreselistselect"])? true : false );
        $newpara->setAllowDelete(isset( $handlerpara["amreselistdelete"])? true : false );
        $emra->persist($newpara);
        $newList->addParameter($newpara);
        //am_downlond_doc
        $newpara = new Parametre();
        $newpara->setUsertype("assmat");
        $newpara->setColumnTitle("am_downlond_doc");
        $newpara->setDispaly(isset( $handlerpara["amallowdownlond"])? true : false );
        $emra->persist($newpara);
        $newList->addParameter($newpara);
        $emra->flush();
        return $newList->getId();
    }
    /**
     * updateAssmatsParams
     * @param $list_para
     * @param $handlerpara
     */
    public function updateAssmatsParams($list_para , $handlerpara){
        foreach ( $list_para->getParameters() as $p){
            if($p->getColumnTitle() == "am_infogenerales"){
                $p->setDispaly(isset( $handlerpara["infoamselect"])? true : false );
                $p->setAllowUpdate(isset( $handlerpara["infoamupdate"])? true : false );
            }
            else  if($p->getColumnTitle() == "am_agrements"){
                $p->setDispaly(isset( $handlerpara["agreselect"])? true : false );
                $p->setAllowUpdate(isset( $handlerpara["agreupdate"])? true : false );
                $p->setAllowDelete(isset( $handlerpara["agredelete"])? true : false );
            }
            else  if($p->getColumnTitle() == "am_mesenfant_am"){
                $p->setDispaly(isset( $handlerpara["mesenfamselect"])? true : false );
                $p->setAllowUpdate(isset( $handlerpara["mesenfamupdate"])? true : false );
                $p->setAllowDelete(isset( $handlerpara["mesenfamdelete"])? true : false );
            }
            else  if($p->getColumnTitle() == "am_enfant_am"){
                $p->setDispaly(isset( $handlerpara["amenfselect"])? true : false );
                $p->setAllowUpdate(isset( $handlerpara["amenfupdate"])? true : false );
                $p->setAllowDelete(isset( $handlerpara["amenfdelete"])? true : false );
            }
            else  if($p->getColumnTitle() == "am_agenda"){
                $p->setDispaly(isset( $handlerpara["amagendaselect"])? true : false );
                $p->setAllowInsert(isset( $handlerpara["amagendasinin"])? true : false );
            }
            else  if($p->getColumnTitle() == "am_agenda_enfants"){
                $p->setAllowInsert(isset( $handlerpara["amagendasininforchild"])? true : false );
            }
            else  if($p->getColumnTitle() == "am_agenda_insc"){
                $p->setDispaly(isset( $handlerpara["amreselistselect"])? true : false );
                $p->setAllowDelete(isset( $handlerpara["amreselistdelete"])? true : false );
            }
            else  if($p->getColumnTitle() == "am_downlond_doc"){
                $p->setDispaly(isset( $handlerpara["amallowdownlond"])? true : false );
            }
        }
    }
    /**
     * @Route("/Services/params/parent/{id}/delete", name="deleteparalistparent" , options={"expose"=true , "method"="POST" }  )
     */
    public function deleteparalistparentAction($id)
    {
        $emra = $this->get('doctrine')->getManager('default');
        $DefaultParentParams = $emra->getRepository('AppBundle:ppf_cofig', 'default')->findOneByTitle("para_list_id_parents");
        $DefaulteListe = $emra->getRepository('AppBundle:listparams', 'default')->findOneByTitle("pr_defaulte");
        $listpara = $emra->getRepository('AppBundle:listparams', 'default')->findOneById($id);
        if( $id != $DefaulteListe->getId() ){
            if($id != $DefaultParentParams->getValue()){
                if($listpara->getParameters()!= null){
//                    $UserUsedThisPara = $emra->getRepository('AppBundle:user_ra', 'default')->findByListparams($listpara);
                    $emra->getRepository('AppBundle:user_ra' ,'default')->UpdateParamsList($id , $DefaultParentParams->getValue());
                    foreach ($listpara->getParameters() as $p) {
                        $emra->remove($p);
                    }
                    $emra->remove($listpara);
                    $emra->flush();
                    return new JsonResponse(true);
                }
            }else
                return new JsonResponse(['data' => "c'est liset utiliser comme parametrage par defaut . "] );
        }else
            return new JsonResponse(['data' => "vous ne pouvez pas supprimer c'est liset . "]);
    }
    /**
     * @Route("/Services/params/assmat/{id}/delete", name="deleteparalistassmat" , options={"expose"=true , "method"="POST" }  )
     */
    public function deleteparalistassmatAction($id)
    {
        $emra = $this->get('doctrine')->getManager('default');
        $DefaultAmParams = $emra->getRepository('AppBundle:ppf_cofig', 'default')->findOneByTitle("para_list_id_assmats");
        $DefaulteListe =$emra->getRepository('AppBundle:listparams', 'default')->findOneByTitle("am_defaulte");
        $listpara = $emra->getRepository('AppBundle:listparams', 'default')->findOneById($id);

        if( $id != $DefaulteListe->getId() ){
            if($id != $DefaultAmParams->getValue()){
                if($listpara->getParameters()!= null){
//                    $UserUsedThisPara = $emra->getRepository('AppBundle:user_ra', 'default')->findByListparams($listpara);
                    $emra->getRepository('AppBundle:user_ra' ,'default')->UpdateParamsList($id , $DefaultAmParams->getValue());
                    foreach ($listpara->getParameters() as $p) {
                        $emra->remove($p);
                    }
                    $emra->remove($listpara);
                    $emra->flush();
                    return new JsonResponse(true);
                }
            }else
                return new JsonResponse(['data' => "c'est liset utiliser comme parametrage par defaut .am "] );
        }else
            return new JsonResponse(['data' => "vous ne pouvez pas supprimer c'est liset .am "]);
    }
}