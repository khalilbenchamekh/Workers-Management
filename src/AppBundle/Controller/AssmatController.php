<?php
/**
 * Created by PhpStorm.
 * User: RABAH Ismail
 * Date: 24/05/2017
 * Time: 10:45
 */
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\GwReservationtempscollectifs;
use ADesigns\CalendarBundle\Entity\EventEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\JsonResponse;

class AssmatController extends Controller
{
    /**
     * @Route("/Assmat/", name="amhome")
     */
    public function famhomeAction(){
        //gramweb entity manager
        $emgw = $this->get('doctrine')->getManager('gramweb');
        //this User
        $this_GW_UserId =$this->getuser()->getp_a_pt_id();
        // get enfants
        //mes enfant
        $Enfants = $emgw->getRepository('AppBundle:GwEnfant', 'gramweb')->getEnfantFor( $this_GW_UserId );
        //Enfants acceuller
        $EnfantsAcceuils = $this->getDoctrine()->getRepository('AppBundle:GwEnfantacceuil', 'gramweb' )->getAllEnfnForOneAm($this_GW_UserId,true);
        //get Temps Collectif d'ejourd'hui
        $now = new \DateTime();
        $tempC = $emgw->getRepository('AppBundle:GwTempsCollectifs', 'gramweb')->getToDayTC();

        //getDocuments
        $allDocs = $this->getDoctrine()->getRepository('AppBundle:document', 'default')->findAll();
        $documents = new ArrayCollection();

        $thisuser = $this->getUser();
        $usertype = $thisuser->getUsertype();
        $userid = $thisuser->getPAPtId();

        $resvtempcolrespo = $this->getDoctrine()->getRepository('AppBundle:GwReservationtempscollectifs', 'gramweb');

        foreach ($allDocs as $doc) {
            $thisDocAccess = explode(",", $doc->getDocaccess());
            if( in_array( 'all' , $thisDocAccess ) )
                $documents->add($doc);
            else{
                //by user type
                if( in_array( $usertype , $thisDocAccess ) )
                    $documents->add($doc);
                elseif(in_array( "s".$usertype ,$thisDocAccess)){
                    $thisids = [];
                    //parents ids
                    if( "s".$usertype === "sparent" )
                        $thisids =  explode(",", $doc->getSparentids());

                    //assmat ids
                    elseif ( "s".$usertype === "sassmat" )
                        $thisids =  explode(",", $doc->getSamids());

                    //part ids
                    elseif ("s".$usertype === "spart" )
                        $thisids =  explode(",", $doc->getSpartids());

                    if( in_array( $userid , $thisids ))
                        $documents->add( $doc );
                }
                //tempscoll
                if(in_array( 'scollectif' , $thisDocAccess )){
                    $outfortest = $resvtempcolrespo->checkResrvForUserInTcs( $userid , $usertype , $doc->getScollectifids() );
                    if($outfortest > 0 && !$documents->contains($doc) ) $documents->add($doc);
                }
            }
        }
        $static['documents']=$documents;
        $static['Enfants']=$Enfants;
        $static['EnfantsAcceuils']=$EnfantsAcceuils;
        $static['tempC']=$tempC;
        return $this->render('assmatpages/amHome.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'static' => $static,
        ]);
    }
    /**
     * @Route("/Assmat/Accueil", name="assmataccueil")
     */
    public function assmataccueilAction(Request $request)
    {
        //this User
        $this_GW_UserId =$this->getuser()->getp_a_pt_id();
        //Parent Reposotory
        $AssmatGwRepo = $this->getDoctrine()->getRepository('AppBundle:GwAm', 'gramweb');
        //gat parents info from gramweb
        $AssmatData = $AssmatGwRepo->findOneById( $this_GW_UserId );

        return $this->render('assmatpages/assmatAccueil.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'AssmatData' => $AssmatData,
        ]);
    }
      /**
      * @Route("/Assmat/agrements", name="assmat_agrements")
      */
     public function agrementsAction(Request $request)
    {
        //this User = this Assmat
        $this_Gw_UserId = $this->getuser()->getp_a_pt_id();
        //get Agrement for this assmat
        $Agrements = $this->getDoctrine()->getRepository('AppBundle:GwAgrement', 'gramweb' )->findByAssmat($this_Gw_UserId);
        return $this->render('assmatpages/Agrements.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'Agrements' => $Agrements,
        ]);
    }
    /**
     * @Route("/Assmat/agrements/{id} ", name="show_agrement")
     */
    public function showAgrmentAction(Request $request , $id)
    {
        $emgw = $this->get('doctrine')->getManager('gramweb');
        //get on agrement bu his id
        $Agrement = $this->getDoctrine()->getRepository('AppBundle:GwAgrement', 'gramweb' )->findOneById($id);

        //get enfant for this agremets
//        $EnfantsAcceuil = $emgw->getRepository('AppBundle:GwEnfantacceuil', 'gramweb')->findByAgrement( $Agrement );
        $EnfantsAcceuil = $emgw->getRepository('AppBundle:GwEnfantacceuil', 'gramweb')->findBy( [ 'agrement' => $id , 'depart' => 0 ]);
        return $this->render('Formes/assmat/showAgrment.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'Agrement' => $Agrement,
            'EnfantsAcceuil' => $EnfantsAcceuil,
        ]);
    }
    /**
     * @Route("/Assmat/EnfantsAcceuils ", name="enfants_acceuils")
     */
    public function enfantsAcceuilsAction(Request $request )
    {
        $this_Gw_UserId = $this->getuser()->getp_a_pt_id();
        $EnfantsAcceuils = $this->getDoctrine()
            ->getRepository('AppBundle:GwEnfantacceuil', 'gramweb' )->getAllEnfnForOneAm($this_Gw_UserId,true);
        return $this->render('assmatpages/EnfantsAccueillis.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'EnfantsAcceuils' => $EnfantsAcceuils,
        ]);
    }
    /**
     * @Route("/Assmat/MesEnfants", name="mes_enfants")
     */
    public function mesEnfantAction(Request $request){
        $this_Am_Gw_Id = $this->getUser()->getp_a_pt_id();
        $MesEnfants = $this->getDoctrine()->getRepository('AppBundle:GwEnfantAssmat','gramweb')->findByAsmat($this_Am_Gw_Id);
        return $this->render('assmatpages/MesEnfants.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'MesEnfants' => $MesEnfants,
        ]);
    }
    /**
     * @Route("/Assmat/Enfants", name="all_enfants")
     */
    public function allEnfantsAction(){
        $this_Gw_UserId = $this->getuser()->getp_a_pt_id();
        $enfants = [];

        $params = $this->getUser()->getListparams() != null ? $this->getUser()->getListparams()->getParameters() : $this->getUser()->getParameters();
        $DisplayAmEnf = $params[2]->getDispaly();
        $DisplayAmEnfAcc = $params[3]->getDispaly();

        if($DisplayAmEnf){
            $MesEnfants = $this->getDoctrine()->getRepository('AppBundle:GwEnfantAssmat','gramweb')->findByAsmat($this_Gw_UserId);
            foreach ($MesEnfants as $enf ){
                $enfants[] =[
                    'id' => $enf->getId(),
                    'nom' => $enf->getNom(),
                    'prenom' => $enf->getPrenom(),
                    'dateN' => $enf->getDateNaissance(),
                ];
            }
        }
        if($DisplayAmEnfAcc){
            $EnfantsAcceuils = $this->getDoctrine()
                ->getRepository('AppBundle:GwEnfantacceuil', 'gramweb' )->getAllEnfnForOneAm($this_Gw_UserId,true);
            foreach ($EnfantsAcceuils as $enfa ){
                $enfants[] =[
                    'id' => $enfa->getEnfant()->getId(),
                    'nom' => $enfa->getEnfant()->getNom(),
                    'prenom' => $enfa->getEnfant()->getPrenom(),
                    'dateN' => $enfa->getEnfant()->getDateNaissance(),
                ];
            }
        }
        return $this->render('assmatpages/AllEnfants.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'MesEnfants' => $enfants,
        ]);
    }
//    public function enfantsAction( Request $request){
//        $this_Gw_AmId = $this->getUser()->getp_apt_id();
//        $EnfantsAcceuils = $this->getDoctrine()->getRepository('AppBundle:G');
//    }
    /**
     * @Route("/Assmat/Agenda", name="assmat_agenda")
     */
    public function agendaAction(Request $request)
    {
        $emgw = $this->get('doctrine')->getManager('gramweb');
        $this_GW_UserId =$this->getuser()->getp_a_pt_id();
//        $tempC = $emgw->getRepository('AppBundle:GwTempsCollectifs', 'gramweb')->findByRelais($ParentData->getRelais());
        $tempC = $emgw->getRepository('AppBundle:GwTempsCollectifs', 'gramweb')->findAll();

        $ResTcGwRepository = $this->getDoctrine()->getRepository('AppBundle:GwReservationtempscollectifs', 'gramweb');
        $curntTcIds = $ResTcGwRepository->getTcIdsForOne( $this_GW_UserId , "assmatReservation");

        $params = $this->getUser()->getListparams() != null ? $this->getUser()->getListparams()->getParameters() : $this->getUser()->getParameters();
        $allowSinIn = $params[4]->getAllowInsert();
        $isAllowSingForChild = $params[5]->getAllowInsert();

        $Events = [];
        foreach( $tempC as $temp ){
            $isUsed = false;
            $isOld = false;
            foreach ($curntTcIds as $key => $val) {
                if ($val[1] === "".$temp->getId()."") {
                    $isUsed = true ;
                }
            }
            $even = new EventEntity($temp->getNom() . ' - ' . $temp->getLieu() , $temp->getDate(),  $temp->getDate(), $isUsed );
            $even->setId($temp->getId());
            $even->setHDeb($temp->getHDeb());
            $even->setHFin($temp->getHFin());
//            $even->setUrl( !$isUsed ? $this->generateUrl('assmat_temp_sin_In', [ 'id' => $temp->getId()] ) : "#" );
            $even->setUrl( $allowSinIn ? ( !$isUsed ? $this->generateUrl('temp_sin_In', [ 'id' => $temp->getId()] ) : "#" ) : false);
            $even->setisAllowSingForChild($isAllowSingForChild);
            $isOld = ($temp->getDate() != null ? $temp->getDate()->format('Y-m-d H:i:s') : null) < date('Y-m-d H:i:s') ? true : false ;
            $even->setBgColor( $isOld && $isUsed ? "#6995b5" : ($isOld ? "#777":(!$isUsed ? "#09c909":"#5fb3f0")));
            $Events[$temp->getId()] = $even;
        }
        return $this->render('assmatpages/agenda.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'evs' => $Events,
        ]);
    }
    /**
     * @Route("/Assmat/Agenda/Events" , name="assmat_valid_agenda")
     */
    public function agendaValidAction(){
        $this_GW_UserId =$this->getuser()->getp_a_pt_id();
        $tempC = $this->get('doctrine')->getRepository('AppBundle:GwTempsCollectifs', 'gramweb')->getValideEvents();
        $inscs = $this->getDoctrine()->getRepository('AppBundle:GwReservationtempscollectifs', 'gramweb');
        $curntTcIds = $inscs->getTcIdsForOne( $this_GW_UserId , "assmatReservation");
        $Events = [];
        foreach( $tempC as $temp ){
            $isUsed = false;
            $bgevnull = false;
            foreach ($curntTcIds as $key => $val) {
                if ($val[1] === "".$temp->getId()."")
                    $isUsed = true;
            }
            $even = new EventEntity($temp->getNom() . ' - ' . $temp->getLieu() , $temp->getDate(),  $temp->getDate(), $isUsed );
            if( intval($inscs->getReservCount($temp->getId())) < $temp->getNbPlaceAdulte() || $temp->getNbPlace() == "indefini" || $temp->getNbPlace() == "0" ){
                $even->setUrl( !$isUsed ? $this->generateUrl('temp_sin_In', [ 'id' => $temp->getId()] ) : "#" );
            }else{
                $bgevnull = true;
                $even->setUrl( "null" );
            }
            $even->setId($temp->getId());
            $even->setHDeb($temp->getHDeb());
            $even->setHFin($temp->getHFin());
//            $even->setUrl( $allowSinIn ? ( !$isUsed ? $this->generateUrl('temp_sin_In', [ 'id' => $temp->getId()] ) : "#" ) : "#");
            $isOld = false;
            $even->setBgColor( $bgevnull ? "#d9534f" :( $isOld && $isUsed ? "#6995b5" : ($isOld ? "#777":(!$isUsed ? "#09c909":"#5fb3f0"))));
            $Events[$temp->getId()] = $even;
        }
        return $this->render('assmatpages/agenda.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'evs' => $Events,
        ]);
    }
    /**
     * @Route("/Assmat/MesInscriptions", name="ammyagenda")
     * @Route("/Assmat/MesInscriptions/{enfid}", name="enfantagenda")
     */
    public function mySinInsAction(Request $request , $enfid = 0)
    {
        $this_GW_UserId =$this->getuser()->getp_a_pt_id();
        $resRposo = $this->getDoctrine()->getRepository('AppBundle:GwReservationtempscollectifs', 'gramweb');

        $EnfantsAcceuils = $this->getDoctrine()->getRepository('AppBundle:GwEnfantacceuil', 'gramweb' )->getAllEnfnForOneAm($this_GW_UserId , true);
        $enfsids = [];
        $enfantname = "";
        foreach ( $EnfantsAcceuils as $enf_a){
            $enfsids[] = $enf_a->getId();
        }
        if ( $enfid != 0 && in_array($enfid , $enfsids)){
            $myInscs = $resRposo->findByEnafntAccueilliReservation( $enfid );
            $enfant = $this->getDoctrine()->getRepository('AppBundle:GwEnfant' , 'gramweb')->findOneById($enfid);
            $enfantname = $enfant->getNom() . $enfant->getPrenom() ;
        }else
            $myInscs = $resRposo->findByAssmatReservation( $this_GW_UserId );
        return $this->render('assmatpages/mesInscriptions.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'myInscs' => $myInscs,
            'EnfantsAcceuils' => $EnfantsAcceuils,
            'enfantname' => $enfantname,
        ]);
    }
    /**
     * @Route("/Assmat/Inscriptions/{id}", name="assmat_temp_sin_In")
     */
    public function tempSinInsAction(Request $request , $id )
    {
        $tempC = $this->get('doctrine')->getManager('gramweb')->getRepository('AppBundle:GwTempsCollectifs', 'gramweb')->findOneById($id);
        //get reserve coute
        $inscs = $this->getDoctrine()->getRepository('AppBundle:GwReservationtempscollectifs', 'gramweb');
        if( $tempC->getNbPlace() == "indefini" || $tempC->getNbPlace() == "" || $tempC->getNbPlace() == "0" || ( intval($tempC->getNbPlaceAdulte()) >  intval($inscs->getReservCount($id)) ))
            $this->addNewReserve($tempC);
        else
            $this->get('session')->getFlashBag()->add('msgs', 'Nombre des places disponible dans le temps collectifs : "'.$tempC->getNom().'" est null . ');
        return $this->redirect( $this->generateUrl('assmat_agenda', array() ));
    }
    /**
     * add New Reserve in temps colictifs
     * @param $tempC
     */
    public function addNewReserve($tempC){
        $this_GW_UserId =$this->getuser()->getp_a_pt_id();
        $emgw = $this->get('doctrine')->getManager('gramweb');
        //check is this am sin in this temp colictif
        $isamin = $this->getDoctrine()->getRepository('AppBundle:GwReservationtempscollectifs', 'gramweb')->checkAmInTc( $this_GW_UserId , $tempC->getId());
        if($isamin == 0){
            $assmat = $this->getDoctrine()->getRepository('AppBundle:GwAm', 'gramweb')->findOneById($this_GW_UserId);
            $newReser = new GwReservationtempscollectifs();
            $newReser->setTempsColl($tempC);
            $newReser->setTypeReservation(0);
            $newReser->setDateReservation(new \DateTime('now'));
            $newReser->setTypeValidation(0);
            $newReser->setDescriptionReservation("this Res. was set from : portail professionnel ");
            $newReser->setAssmatReservation($assmat);
            $emgw->persist($newReser);
            $emgw->flush();
            $this->get('session')->getFlashBag()->add('msgs', 'Votre demande d\'inscription au temps collectifs "'.$tempC->getNom().'" a bien été enregistrée.');
        }else
            $this->get('session')->getFlashBag()->add('msgs', 'Votre demande d\'inscription au temps collectifs "'.$tempC->getNom().'" est déjà enregistrée.');
    }
    /**
     * @Route("/Assmat/Inscriptions/Enfants/{tcid}", name="sininforchilds" , options={"expose"=true , "method"="GET" }  )
     */
    public function sinInForChilds(Request $request , $tcid ){
        $data =  $request->get('data');
        $oldvalus = explode(',' ,ltrim($data['oldvalus'] ,','));
        $enfnsids = explode(',' , ltrim($data['newvalus'] ,','));

        $this_GW_UserId =$this->getuser()->getp_a_pt_id();
        $emgw = $this->get('doctrine')->getManager('gramweb');

        $tempC = $emgw->getRepository('AppBundle:GwTempsCollectifs', 'gramweb')->findOneById($tcid);

        //check is this am sin in this temp colictif
        $inscs = $this->getDoctrine()->getRepository('AppBundle:GwReservationtempscollectifs', 'gramweb');
        $isamin = $inscs->checkAmInTc( $this_GW_UserId , $tcid);
        if ($isamin == 0 ){
            $am = $emgw->getRepository('AppBundle:GwAm' , 'gramweb')->findOneById($this_GW_UserId);
            $newResForAm = new GwReservationtempscollectifs();
            $newResForAm->setTempsColl($tempC);
            $newResForAm->setTypeReservation(0);
            $newResForAm->setDateReservation(new \DateTime('now'));
            $newResForAm->setTypeValidation(0);
            $newResForAm->setDescriptionReservation("this Res. was set from : portail professionnel Am + enfants");
            $newResForAm->setAssmatReservation($am);
            $emgw->persist($newResForAm);
        }
        //nb enfant in
        $nbEnfRes = $this->getDoctrine()->getRepository('AppBundle:GwReservationtempscollectifs', 'gramweb')->getReservCountEnf($tcid);
        $nbEnfaPlac = $tempC->getNbPlaceEnfant();

        //Sin In Childrns
        foreach ($enfnsids as $enfid )
        {
            if( ! in_array($enfid,$oldvalus  ) && $nbEnfaPlac > $nbEnfRes ){
                $enfantAcc = $this->getDoctrine()->getRepository('AppBundle:GwEnfantacceuil' , 'gramweb')->findOneByEnfant($enfid);
                $newReser = new GwReservationtempscollectifs();
                $newReser->setTempsColl($tempC);
                $newReser->setTypeReservation(0);
                $newReser->setDateReservation(new \DateTime('now'));
                $newReser->setTypeValidation(0);
                $newReser->setDescriptionReservation("this Res. was set from : portail professionnel Am Enfant reservation");
                $newReser->setEnafntAccueilliReservation($enfantAcc);
                $emgw->persist($newReser);
                $nbEnfRes ++;
            }
            //else //deja inscrip o bine le nb enfat place est plane
        }
        $emgw->flush();
        return new JsonResponse(['data' => true]);
    }
    /**
     * @Route("/Services/getchildsofam/{tcid}", name="getchildsofam" , options={"expose"=true , "method"="GET" }  )
     */
    public function getchildsofamAction($tcid)
    {
        $this_Gw_UserId = $this->getuser()->getp_a_pt_id();
        $EnfantsAcceuils = $this->getDoctrine()->getRepository('AppBundle:GwEnfantacceuil', 'gramweb' )->getAllEnfnForOneAm($this_Gw_UserId , true);
        $usersInIds = [];
        $reserByTempColl = $this->getDoctrine()->getRepository('AppBundle:GwReservationtempscollectifs', 'gramweb')->findByTempsColl( $tcid );
        foreach ($reserByTempColl as $res){
            if($res->getEnafntAccueilliReservation() != null ){
                $usersInIds[] = $res->getEnafntAccueilliReservation()->getEnfant()->getId();
            }
        }
        foreach ( $EnfantsAcceuils as $am_arg_enf){
            $isin = in_array($am_arg_enf->getEnfant()->getId() , $usersInIds) ? true : false ;
            $data[] = [
                'id' => $am_arg_enf->getEnfant()->getId(),
                'nam' => $am_arg_enf->getEnfant()->getNom() . " ".$am_arg_enf->getEnfant()->getPrenom(),
                'isin' => $isin
            ];
        }
        return new JsonResponse($data);
    }
    /**
     * @Route("/Services/tcresamsendmail/{tcrid}", name="tc_res_send_mail_am")
     */
    public function tempColictifSendResrveMailAction(Request $request , $tcrid )
    {
        $rtc = $this->get('doctrine')->getRepository('AppBundle:GwReservationtempscollectifs' , 'gramweb')->findOneById($tcrid);
        $ppfDefaultEmail = $this->get('doctrine')->getRepository('AppBundle:ppf_cofig')->findOneByTitle('ppf_default_email')->getValue();
        $emailto="";
        if( $rtc->getAssmatReservation() != null ){
            if ($rtc->getAssmatReservation()->getAdresseMail() != null) {
                $emailto = $rtc->getAssmatReservation()->getAdresseMail();
            }
        }
       $emailto = 'i.rabah@liger-cd.com';
        if($emailto != null){
            $message = (new \Swift_Message('Portail professionnel & famille : reservation ou temps collictif'))
                ->setFrom($ppfDefaultEmail)
                ->setTo($emailto)
                ->setBody(
                    $this->renderView('Emails/registration.html.twig',array('resr' =>$rtc )),
                    'text/html'
                );
            $this->get('mailer')->send($message);
            $this->get('session')->getFlashBag()->add('msgs', 'Email à éte envoyé avec success, Vérifiez votre boîte de réception .');
        }else
            $this->get('session')->getFlashBag()->add('msgs', 'Aucune adresse mail à éte trouvée dans votre compte .');
        //   return $this->render('Emails/registration.html.twig',array('resr' =>$rtc));
            return $this->redirect($request->headers->get('referer'));
    }
     /**
      * @Route("/Assmat/Telechargements", name="amtelechargement")
      */
     public function telechargementAction(Request $request)
     {
         $allDocs = $this->getDoctrine()->getRepository('AppBundle:document', 'default')->findAll();
         $documents = new ArrayCollection();

         $thisuser = $this->getUser();
         $usertype = $thisuser->getUsertype();
         $userid = $thisuser->getPAPtId();

         $resvtempcolrespo = $this->getDoctrine()->getRepository('AppBundle:GwReservationtempscollectifs', 'gramweb');

         foreach ($allDocs as $doc) {
             $thisDocAccess = explode(",", $doc->getDocaccess());
             if( in_array( 'all' , $thisDocAccess ) )
                 $documents->add($doc);
             else{
                 //by user type
                 if( in_array( $usertype , $thisDocAccess ) )
                     $documents->add($doc);
                 elseif(in_array( "s".$usertype ,$thisDocAccess)){
                     $thisids = [];
                     //parents ids
                     if( "s".$usertype === "sparent" )
                         $thisids =  explode(",", $doc->getSparentids());

                     //assmat ids
                     elseif ( "s".$usertype === "sassmat" )
                         $thisids =  explode(",", $doc->getSamids());

                     //part ids
                     elseif ("s".$usertype === "spart" )
                         $thisids =  explode(",", $doc->getSpartids());

                     if( in_array( $userid , $thisids ))
                         $documents->add( $doc );
                 }
                 //tempscoll
                 if(in_array( 'scollectif' , $thisDocAccess )){
                     $outfortest = $resvtempcolrespo->checkResrvForUserInTcs( $userid , $usertype , $doc->getScollectifids() );
                     if($outfortest > 0 && !$documents->contains($doc) ) $documents->add($doc);
                 }
             }
         }
         return $this->render('assmatpages/Telechargement.html.twig', [
             'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
             'documents' => $documents
         ]);
     }
}
