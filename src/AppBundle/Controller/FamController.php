<?php
/**
 * Created by PhpStorm.
 * User: RABAH Ismail
 * Date: 24/05/2017
 * Time: 10:45
 */
namespace AppBundle\Controller;
use AppBundle\Entity\GwReservationtempscollectifs;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ADesigns\CalendarBundle\Entity\EventEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\JsonResponse;

class FamController extends Controller
{
    /**
     * @Route("/Parent/", name="famhome")
     */
    public function famhomeAction(){
        //gramweb entity manager
        $emgw = $this->get('doctrine')->getManager('gramweb');
        //this User
        $this_GW_UserId =$this->getuser()->getp_a_pt_id();
        // get enfants
        $Enfants = $emgw->getRepository('AppBundle:GwEnfant', 'gramweb')->getEnfantFor( $this_GW_UserId );
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
        $static['tempC']=$tempC;
        return $this->render('pages/famhome.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'static' => $static,
        ]);
    }
    /**
     * @Route("/Parent/Accueil", name="accueil")
     */
    public function AccueilAction(Request $request)
    {
        //this User
        $this_GW_UserId =$this->getuser()->getp_a_pt_id();
        //Parent Reposotory
        $ParentGwRepo = $this->getDoctrine()->getRepository('AppBundle:GwParent', 'gramweb');
        //gat parents info from gramweb 
        $ParentData = $ParentGwRepo->getinfos( $this_GW_UserId );

        return $this->render('pages/Accueil.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'ParentData' => $ParentData
        ]);
    }
     /**
      * @Route("/Parent/ficheFamille", name="ficheFamille")
      */
    public function fichefamilleAction(Request $request)
     {

         $emgw = $this->get('doctrine')->getManager('gramweb');
         $thisUserId =$this->getuser()->getp_a_pt_id();
         $Parnet = $emgw->getRepository('AppBundle:GwParent', 'gramweb')->findOneById( $thisUserId );

         $Resp1 = $Parnet->getResponsable1();
         $Resp2 = $Parnet->getResponsable2();
         $Enfants = $emgw->getRepository('AppBundle:GwEnfant', 'gramweb')->getEnfantFor( $thisUserId );

         return $this->render('pages/ficheFamille.html.twig', [
             'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
             'Resp1' => $Resp1,
             'Resp2' => $Resp2,
             'Enfants' => $Enfants,
         ]);
     }
    /**
     * @Route("/Parent/resp1", name="resp1")
     */
    public function resp1Action(Request $request)
    {
        $emgw = $this->get('doctrine')->getManager('gramweb');
        $thisUserId =$this->getuser()->getp_a_pt_id();
        $Parnet = $emgw->getRepository('AppBundle:GwParent', 'gramweb')->findOneById( $thisUserId );

        $Resp1 = $Parnet->getResponsable1();

        return $this->render('pages/Resp1.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'Resp1' => $Resp1,
        ]);
    }
     /**
     * @Route("/Parent/resp2", name="resp2")
     */
    public function resp2Action(Request $request)
    {
        $emgw = $this->get('doctrine')->getManager('gramweb');
        $thisUserId =$this->getuser()->getp_a_pt_id();
        $Parnet = $emgw->getRepository('AppBundle:GwParent', 'gramweb')->findOneById( $thisUserId );
        $Resp2 = $Parnet->getResponsable2();

        return $this->render('pages/Resp2.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'Resp2' => $Resp2,
        ]);
    }
     /**
     * @Route("/Parent/enfants", name="enfants")
     */
    public function enfantsAction(Request $request)
    {
        $emgw = $this->get('doctrine')->getManager('gramweb');
        $thisUserId =$this->getuser()->getp_a_pt_id();

        $Enfants = $emgw->getRepository('AppBundle:GwEnfant', 'gramweb')->getEnfantFor( $thisUserId );

        return $this->render('pages/enfants.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'Enfants' => $Enfants,
        ]);
    }
    /**
     * @Route("/Parent/enfant/{id}", name="show_enfant")
     */
    public function showEnfantAction(Request $request , $id)
    {
        $emgw = $this->get('doctrine')->getManager('gramweb');
        $Enfant = $emgw->getRepository('AppBundle:GwEnfant', 'gramweb')->findOneById( $id );
        //get am for this enfant

        $EnfantsAm = $emgw->getRepository('AppBundle:GwEnfantacceuil', 'gramweb')->findBy( [ 'enfant' => $id , 'depart' => 0 ]);

        return $this->render('Formes/parent/showEnfant.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'Enfant' => $Enfant,
            'EnfantsAm' => $EnfantsAm,
        ]);
    }

    /**
     * @Route("/Parent/Agenda/", name="agenda_all", options={"expose"=true , "method"="GET" })
     * @Route("/Parent/Agenda/{action}", name="agenda_action")
     */
    public function AgendaAction(Request $request, $action = "all" )
    {
        $tt = $action != "all" ? $request->get('action') : $action;
        $emgw = $this->get('doctrine')->getManager('gramweb');
        $this_GW_UserId =$this->getuser()->getp_a_pt_id();
        //enfant ids in simle array
        $Enfants = $emgw->getRepository('AppBundle:GwEnfant', 'gramweb')->getEnfantFor( $this_GW_UserId );
        $enfids = "";
        foreach ( $Enfants as $enf){
            $enfids .= ",".$enf['id'];
        }
        //get lists de les am aceuill les enfants de ce famille
        $amlist = $emgw->getRepository('AppBundle:GwEnfantacceuil', 'gramweb')->getAllAmForOneFam( ltrim($enfids, ',') );
        $amids = [];
        foreach ($amlist as $a){
            $amids[] = $a->getId();
        }
        $Events = [];
        $do ="";
        if( $tt == "all"){
            $Events = $this->getAllTempsCol($this_GW_UserId);
        }else{
            if( $tt == "Events"){
                $Events = $this->getEventsForThisUser($this_GW_UserId);
                $do = "Events";
            }else{
                $amid = intval($tt);
                if( $amid > 0 &&  is_numeric($tt) && in_array($amid , $amids) ){
                    $Events = $this->getAgendaOfAm( $amid );
                    $do = "amagenda";
                }else{
                    return $this->redirect( $this->generateUrl('agenda_all'));
                }
            }
        }
        //get all temps collictif
        //Parent Reposotory
//        $ParentGwRepo = $this->getDoctrine()->getRepository('AppBundle:GwParent', 'gramweb');
        //gat parents info from gramweb
//        $ParentData = $ParentGwRepo->getinfos( $this_GW_UserId );
//        $tempC = $emgw->getRepository('AppBundle:GwTempsCollectifs', 'gramweb')->findByRelais($ParentData->getRelais());
        return $this->render('pages/agenda.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'evs' => $Events,
            'amlist' => $amlist,
            'do' => $do
        ]);
    }
    /**
     * get Agenda Of Am by his id
     * @param $amid
     * @return array
     */
    public function getAgendaOfAm( $amid ){
        $emgw = $this->get('doctrine')->getManager('gramweb');
        $curntTcIds = $this->getDoctrine()->getRepository('AppBundle:GwReservationtempscollectifs', 'gramweb')
            ->getTcIdsForOne( $amid , "assmatReservation");
        $tcids = "";
        foreach ($curntTcIds as $t ){
            if( $t[1] != null )
                $tcids .= ",".$t[1];
        }
        $tcids = ltrim($tcids ,',');

        $tempC = $emgw->getRepository('AppBundle:GwTempsCollectifs', 'gramweb')->getByids($tcids);
        $Events = [];
        foreach( $tempC as $temp ){
            $isUsed = true;
            $isOld = false;
            $even = new EventEntity($temp->getNom() . ' - ' . $temp->getLieu() , $temp->getDate(),  $temp->getDate(), $isUsed );
            $even->setId($temp->getId());
            $even->setHDeb($temp->getHDeb());
            $even->setHFin($temp->getHFin());
            $even->setUrl( !$isUsed ? $this->generateUrl('temp_sin_In', [ 'id' => $temp->getId()] ) : "#" ) ;
//            $even->setUrl( $allowSinIn ? ( !$isUsed ? $this->generateUrl('temp_sin_In', [ 'id' => $temp->getId()] ) : "#" ) : "#");
            $isOld = ($temp->getDate() != null ? $temp->getDate()->format('Y-m-d H:i:s') : null) < date('Y-m-d H:i:s') ? true : false ;
            $even->setBgColor( $isOld && $isUsed ? "#777" : ($isOld ? "#777":(!$isUsed ? "#09c909":"#5fb3f0")));
            $Events[$temp->getId()] = $even;
        }
        return $Events;
    }
    /**
     * get am temps collictif in modale <|====
     * @Route("/Services/gettempcolforam/{amid}", name="gettempcolforam" , options={"expose"=true , "method"="GET" }  )
     */
    public function gettempcolforamAction(Request $request , $amid)
    {
        $emgw = $this->get('doctrine')->getManager('gramweb');
        $curntTcIds = $this->getDoctrine()->getRepository('AppBundle:GwReservationtempscollectifs', 'gramweb')
            ->getTcIdsForOne( $amid , "assmatReservation");
        $tcids = "";
        foreach ($curntTcIds as $t ){
            if($t[1] != null )
                $tcids .= ",".$t[1];
        }
        $tcids = ltrim($tcids ,',');
        $tempC = $emgw->getRepository('AppBundle:GwTempsCollectifs', 'gramweb')->getByids($tcids);
        $EventsForCal = array();
        foreach( $tempC as $temp ){
            $isUsed = false;
            $e = array();
            $e['id'] = $temp->getId();
            $e['title'] = $temp->getNom() . ' - ' . $temp->getLieu();
            $e['start'] = $temp->getDate()->format('Y-m-d H:i:s');
            $e['HDeb'] = $temp->getHDeb();
            $e['HFin'] = $temp->getHFin();
            $e['url2'] = "#";
            $e['isUsed'] = $isUsed;
            $e['backgroundColor'] = '#5fb3f0' ;//#09c909
            array_push($EventsForCal, $e);
        }
        return new JsonResponse(['data' => $EventsForCal ]);
    }
    /**
     * get Valid Events For This User
     * @param $this_GW_UserId
     * @return array
     */
    public function getEventsForThisUser($this_GW_UserId){
        $emgw = $this->get('doctrine')->getManager('gramweb');
//        $tempC = $emgw->getRepository('AppBundle:GwTempsCollectifs', 'gramweb')->findAll();
        $tempC = $emgw->getRepository('AppBundle:GwTempsCollectifs', 'gramweb')->getValideEvents();
        $inscs = $this->getDoctrine()->getRepository('AppBundle:GwReservationtempscollectifs', 'gramweb');
        $curntTcIds = $inscs->getTcIdsForOne( $this_GW_UserId , "familleReservation");
        $Events = [];
        foreach( $tempC as $temp ){
            $isUsed = false;
            $bgevnull = false;
            foreach ($curntTcIds as $key => $val) {
                if ($val[1] === "".$temp->getId()."")
                    $isUsed = true;
            }
            $even = new EventEntity($temp->getNom() . ' - ' . $temp->getLieu() , $temp->getDate(),  $temp->getDate(), $isUsed );
            if( intval($inscs->getReservCount($temp->getId())) < $temp->getNbPlaceAdulte() || $temp->getNbPlace() == "indefini"|| $temp->getNbPlace() == "0" ){
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
            $even->setBgColor( $bgevnull ? "#d9534f" : ($isOld && $isUsed ? "#6995b5" : ($isOld ? "#777":(!$isUsed ? "#09c909":"#5fb3f0"))));
            $Events[$temp->getId()] = $even;
        }
        return $Events;
    }
    /**
     * get All Temps Col For One User
     * @param $this_GW_UserId
     * @return array
     */
    public function getAllTempsCol($this_GW_UserId){
        $emgw = $this->get('doctrine')->getManager('gramweb');
        $tempC = $emgw->getRepository('AppBundle:GwTempsCollectifs', 'gramweb')->findAll();
        $curntTcIds = $this->getDoctrine()->getRepository('AppBundle:GwReservationtempscollectifs', 'gramweb')
                                          ->getTcIdsForOne( $this_GW_UserId , "familleReservation");
        //get user params
        $params = $this->getUser()->getListparams() != null ? $this->getUser()->getListparams()->getParameters() : $this->getUser()->getParameters();
        $allowSinIn = $params[5]->getAllowInsert();

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
//            $even->setUrl( !$isUsed ? $this->generateUrl('temp_sin_In', [ 'id' => $temp->getId()] ) : "#" ) ;
            $even->setUrl( $allowSinIn ? ( !$isUsed ? $this->generateUrl('temp_sin_In', [ 'id' => $temp->getId()] ) : "#" ) : false);
            $isOld = ($temp->getDate() != null ? $temp->getDate()->format('Y-m-d H:i:s') : null) < date('Y-m-d H:i:s') ? true : false ;
            $even->setBgColor( $isOld && $isUsed ? "#6995b5" : ($isOld ? "#777":(!$isUsed ? "#09c909":"#5fb3f0")));
            $Events[$temp->getId()] = $even;
        }
        return $Events;
    }
    /**
     * @Route("/Parent/MesInscriptions", name="my_sin_ins")
     */
    public function mySinInsAction(Request $request)
    {
        $this_GW_UserId =$this->getuser()->getp_a_pt_id();
        $inscs = $this->getDoctrine()->getRepository('AppBundle:GwReservationtempscollectifs', 'gramweb');
        $myInscs = $inscs->findByFamilleReservation( $this_GW_UserId );

        return $this->render('pages/mesInscriptions.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'myInscs' => $myInscs,
        ]);
    }
    /**
     * @Route("/Services/tcressendmail/{tcrid}", name="tc_res_send_mail")
     */
    public function tempColictifSendResrveMailAction(Request $request , $tcrid )
    {
        $rtc = $this->get('doctrine')->getRepository('AppBundle:GwReservationtempscollectifs' , 'gramweb')->findOneById($tcrid);
        $ppfDefaultEmail = $this->get('doctrine')->getRepository('AppBundle:ppf_cofig')->findOneByTitle('ppf_default_email')->getValue();
        $emailto="";
        if( $rtc->getFamilleReservation() != null ){
            $pr = $rtc->getFamilleReservation();
            if( $pr->getResponsable2() != null){
                if ($pr->getResponsable2()->getAdresseMailPro()  != null )
                    $emailto = $pr->getResponsable2()->getAdresseMailPro() ;
                else if ($pr->getResponsable2()->getAdresseMail() != null )
                    $emailto = $pr->getResponsable2()->getAdresseMail();
            }
            if( $pr->getResponsable1() != null) {
                if ($pr->getResponsable1()->getAdresseMailPro() != null)
                    $emailto = $pr->getResponsable1()->getAdresseMailPro();
                else if ($pr->getResponsable1()->getAdresseMail() != null)
                    $emailto = $pr->getResponsable1()->getAdresseMail();
            }
            if ($pr->getEmailEnvoi() != null)
                $emailto = $pr->getEmailEnvoi();
        }
//        $emailto = 'i.rabah@liger-cd.com';
        if($emailto != null){
            $message = (new \Swift_Message('Portail professionnel & famille : reservation ou temps collictif'))
                ->setFrom($ppfDefaultEmail)
                ->setTo($emailto)
                ->setBody( $this->renderView('Emails/registration.html.twig',array('resr' =>$rtc )),'text/html');
            $this->get('mailer')->send($message);
            $this->get('session')->getFlashBag()->add('msgs', 'Email à éte envoyé avec success, Vérifiez votre boîte de réception .');
        }else
            $this->get('session')->getFlashBag()->add('msgs', 'Aucune adresse mail à éte trouvée dans votre compte .');
//        return $this->render('Emails/registration.html.twig',array('resr' =>$rtc));
        return $this->redirect($request->headers->get('referer'));
    }
    /**
     * @Route("/Parent/Inscriptions/{id}", name="temp_sin_In")
     */
    public function tempSinInsAction(Request $request , $id )
    {
        $tempC = $this->get('doctrine')->getManager('gramweb')->getRepository('AppBundle:GwTempsCollectifs', 'gramweb')->findOneById($id);
        //get reserve coute
        $inscs = $this->getDoctrine()->getRepository('AppBundle:GwReservationtempscollectifs', 'gramweb');
        if( $tempC->getNbPlace() == "indefini" || $tempC->getNbPlace() == "" || $tempC->getNbPlace() == "0" ||( intval($tempC->getNbPlaceAdulte()) >  intval($inscs->getReservCount($id)) )  )
            $this->addNewReserve($tempC);
        else
            $this->get('session')->getFlashBag()->add('msgs', 'Nombre des places disponible dans le temps collectifs : "'.$tempC->getNom().'" est null . ');
        return $this->redirect( $this->generateUrl('agenda_all', array() ));
    }
    /**
     * Add New Reservation in one temp collecitif
     * @param $tempC
     */
    public function addNewReserve($tempC){
        $emgw = $this->get('doctrine')->getManager('gramweb');
        $this_GW_UserId =$this->getuser()->getp_a_pt_id();
        $parent = $this->getDoctrine()->getRepository('AppBundle:GwParent', 'gramweb')->findOneById($this_GW_UserId);
        $newReser = new GwReservationtempscollectifs();
        $newReser->setTempsColl($tempC);
        $newReser->setTypeReservation(0);
        $newReser->setDateReservation(new \DateTime('now'));
        $newReser->setTypeValidation(0);
        $newReser->setDescriptionReservation("this Res. was set from : portail professionnel ");
        $newReser->setFamilleReservation($parent);
        $emgw->persist($newReser);
        $emgw->flush();
        $this->get('session')->getFlashBag()->add('msgs', 'Votre demande d\'inscription au temps collectifs "'.$tempC->getNom().'" a bien été enregistrée. ');
    }
     /**
     * @Route("/Parent/Telechargements", name="telechargement")
     */
    public function telechargementAction()
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
        return $this->render('pages/Telechargement.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'documents' => $documents,
        ]);
    }


}