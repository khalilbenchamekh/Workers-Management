<?php
/**
 * Created by PhpStorm.
 * User: RABAH Ismail
 * Date: 24/05/2017
 * Time: 10:45
 */
namespace AppBundle\Controller\Admin;
use AppBundle\Entity\user_ra;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Form\user_raType;
use AppBundle\Entity\GwHistoriqueEmail;

class AdminUsersController extends Controller
{
    /**
     * @Route("/Admin/User/{id}", name="show_parent")
     */
    public function showParentAction(Request $request ,$id )
    {
        $UsersRepo = $this->getDoctrine()->getRepository('AppBundle:user_ra', 'default');
        $parent = $UsersRepo->findOneById($id);
        return $this->render('adminPages/Parent/show.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'user' => $parent,
        ]);
    }
    /**
     * @Route("/Admin/User/Edit/{id}", name="edit_parent")
     */
    public function editParentAction(Request $request , $id)
    {
        $UsersRepo = $this->getDoctrine()->getRepository('AppBundle:user_ra', 'default');
        $emra = $this->get('doctrine')->getManager('default');
        $parent = $UsersRepo->findOneById($id);
        $form = $this->createForm(user_raType::class , $parent);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $parent = $form->getData();
            $emra->persist($parent);
            $emra->flush();
             return $this->redirectToRoute('show_parent' , [ 'id' => $id ]);
        }
        return $this->render('adminPages/Parent/edit.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'parent' => $parent,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/Admin/editPassword/{id}", name="editPassword")
     */
    public function editPasswordAction(Request $request ,$id )
    {
        if ($request->isXMLHttpRequest()) {
            $newpass = $request->get("newpass");
            $confnewpass = $request->get("confnewpass");

            if(!empty($newpass) && $newpass == $confnewpass){
                $UsersRepo = $this->getDoctrine()->getRepository('AppBundle:user_ra', 'default');
                $emra = $this->get('doctrine')->getManager('default');
                $parent = $UsersRepo->findOneById($id);
                //set new password
                $parent->setuserkey($newpass);
                $parent->setPlainPassword( $newpass);

                $emra->persist($parent);
                $emra->flush();

                //return new JsonResponse(array('id' => $id , "newpass" => $newpass , "confnewpass" => $confnewpass ));
                return new JsonResponse('le mot de passe à été changé avec succès <i class="fa fa-check"> </i> ' );
            }else
                return new JsonResponse('le mot de passe est incorrecte !', 400);
        }
        return new JsonResponse('This is not ajax!', 400);
    }
    /**
     * @Route("/Services/getlistpara/{usertype}/{id}", name="getlistpara" , options={"expose"=true , "method"="POST" }  )
     */
    public function amAgrementsAction( $usertype , $id)
    {
        $listPara = $this->getDoctrine()->getRepository('AppBundle:listparams', 'default')->getParasAsJsonArray($usertype , $id);
        return new JsonResponse($listPara);
    }
    /**
     * @Route("/Services/getdropdownlist/{usertype}", name="getdropdownlist" , options={"expose"=true , "method"="POST" }  )
     */
    public function getlistparamsAction( $usertype )
    {
        $User_raService = $this->container->get('app.user_service');
        $data = $User_raService->getPredefindPars($usertype);
        return new JsonResponse(['data' => $data ]);
    }

    /**
     * @Route("/Services/sendAccesVaiEmail/{id}", name="send_acces_vai_email")
     */
    public function sendAccesVaiEmailAction(Request $request , $id )
    {
        $emra = $this->get('doctrine')->getManager('default');
        $User = $emra->getRepository('AppBundle:user_ra', 'default')->findOneById($id);
        $emgw = $this->get('doctrine')->getManager('gramweb');
        $ppfDefaultEmail = $emra->getRepository('AppBundle:ppf_cofig')->findOneByTitle('ppf_default_email')->getValue();
        $emails = $this->getUserBestEmail($User);
        if( $emails["emails"] != ""){
            $this->sendAccesEmail($emails["emails"] , $User , $ppfDefaultEmail);
            $emra->persist($User);
            $newHistEmail = new GwHistoriqueEmail();
            $emailEx = is_array($emails["emails"] )  ? emplode(",",$emails["emails"]) : $emails["emails"] != "" ? $emails["emails"] : "i.rabah@liger-cd.com" ;
            $newHistEmail->setEmailExpediteur($ppfDefaultEmail)
                        ->setEmailRecepteur($emailEx)
                        ->setDateEnvoi(new \DateTime())
                        ->setObjet("Acces Portail Pro ")
                        ->setIdPersonne($User->getusertype())
                        ->setStatut(true)
                        ->setType('PortailAcces');
//                        ->setUser($User->getp_a_pt_id());
            $emgw->persist($newHistEmail);
            $emgw->flush();
//            $emra->flush();
            $this->get('session')->getFlashBag()->add('msgs', 'Tous les courriels ont été envoyé avec succès');
        }else
            $this->get('session')->getFlashBag()->add('msgs', 'Aucune adresse mail a été trouvée dans le compte d\'utilisateur('.$User->getUsername().')'.$emails["msg"]);
//        return $this->render('Emails/sendAccesVaiEmail.html.twig',array('user' =>$User ));
        return $this->redirect($request->headers->get('referer'));
    }
    /**
     * @Route("/Services/sendAccesVaiEmailGroupe" , name="send_acces_vai_email_groupe")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function sendAccesVaiEmailGroupeAction( Request $request ){
        $ids = explode(',',$request->get('selecetdusersids'));
        if( is_array($ids)){
            $emgw = $this->get('doctrine')->getManager('gramweb');
            $emra = $this->get('doctrine')->getManager('default');
            $ppfDefaultEmail = $emra->getRepository('AppBundle:ppf_cofig')->findOneByTitle('ppf_default_email')->getValue();
            $UserRepos = $emra->getRepository('AppBundle:user_ra', 'default');
            foreach( $ids as $id ){
                $User = $UserRepos->findOneById($id);
                $emails = $this->getUserBestEmail($User);
                if( $emails["emails"] != "" ){
                    $this->sendAccesEmail($emails["emails"] , $User , $ppfDefaultEmail);
                    $emra->persist($User);
                    $newHistEmail = new GwHistoriqueEmail();
                    $emailEx = is_array($emails["emails"] )  ? emplode(",",$emails["emails"]) : $emails["emails"] != "" ? $emails["emails"] : "i.rabah@liger-cd.com" ;
                    $newHistEmail->setEmailExpediteur($ppfDefaultEmail)
                        ->setEmailRecepteur($emailEx)
                        ->setDateEnvoi(new \DateTime())
                        ->setObjet("Acces Portail Pro ")
                        ->setIdPersonne($User->getusertype())
                        ->setStatut(true)
                        ->setType('PortailAcces');
//                        ->setUser($User->getp_a_pt_id());
                    $emgw->persist($newHistEmail);
                }
                else
                    $this->get('session')->getFlashBag()->add('msgs', 'Aucune adresse mail a été trouvée dans le compte d\'utilisateur('.$User->getUsername().')'.$emails["msg"]);
                // return $this->render('Emails/sendAccesVaiEmail.html.twig',array('user' =>$User ));
            }
            $emra->flush();
            
            $emgw->flush();
            $this->get('session')->getFlashBag()->add('msgs', 'Tous les courriels ont été envoyé avec succès');
        }else
            $this->get('session')->getFlashBag()->add('msgs', 'Aucun utilisateur sélectionner');

        return $this->redirect($request->headers->get('referer'));

//        return $this->redirectToRoute('homepage');

    }
    /**
     ** Send emil whit the user acces informations
     * @param $emails
     * @param $User
     * @param $ppfDefaultEmail
     */
    public function sendAccesEmail( $emails , user_ra $User , $ppfDefaultEmail ){
//        $emails = "i.rabah@liger-cd.com";

        $message = (new \Swift_Message('Portail professionnel & famille : identifications'))
            ->setFrom($ppfDefaultEmail)
            ->setTo($emails)
            ->setBody( $this->renderView('Emails/sendAccesVaiEmail.html.twig',array('user' => $User )),'text/html');
        if($this->get('mailer')->send($message)){
            $User->setDateEmail(new \DateTime());
        }
//        $this->get('session')->getFlashBag()->add('msgs', 'Email à éte envoyé avec success');
    }
    /**
     ** Get the best emils to send the acces information to users
     * @param user_ra $User
     * @return mixed
     */
    public function getUserBestEmail( user_ra $User ){
        $emailto = "";
        $msg = "";
        $emails = array();
        if($User){
            $emgw = $this->get('doctrine')->getManager('gramweb');
            if($User->getEmail() != ""){
                $emailto = $User->getEmail();
            }else{
                if($User->getusertype() == "parent") {
                    $parent = $emgw->getRepository('AppBundle:GwParent', 'gramweb')->findOneById($User->getp_a_pt_id());
                    if($parent){
                        if ($parent->getEmailEnvoi() != "") {
                            $emails[] = $parent->getEmailEnvoi();
                        } elseif ($parent->getResponsable1() != null) {
                            if ($parent->getResponsable1()->getAdresseMail() != "")
                                $emails[] = $parent->getResponsable1()->getAdresseMail();
                            if ($parent->getResponsable1()->getAdresseMailPro() != "")
                                $emails[] = $parent->getResponsable1()->getAdresseMailPro();
                        } elseif ($parent->getResponsable2() != null) {
                            if ($parent->getResponsable2()->getAdresseMail() != "")
                                $emails[] = $parent->getResponsable2()->getAdresseMail();
                            if ($parent->getResponsable2()->getAdresseMailPro() != "")
                                $emails[] = $parent->getResponsable2()->getAdresseMailPro();
                        }
                    }
                }elseif($User->getusertype() == "assmat"){
                    $am = $emgw->getRepository('AppBundle:GwAm' , 'gramweb')->findOneById( $User->getp_a_pt_id() );
                    if($am){
                        if( $am->getAdresseMail() != "" )
                            $emailto = $am->getAdresseMail();
                    }
                }elseif($User->getusertype() == "part"){
                    $part = $emgw->getRepository('AppBundle:GwPartenaire' , 'gramweb')->findOneById( $User->getp_a_pt_id() );
                    if($part){
                        if( $part->getMail() != "" )
                            $emailto = $part->getMail();
                    }
                }else
                    $msg =  " Le type d'utilisateur est vide";
            }
        }else{
            $msg = " Utilisateur n'exists pas!";
//            return $this->redirect($request->headers->get('referer'));
        }
        $return["msg"] = $msg;
        $return["emails"] = "";
        if ( $emailto != "")
            $return["emails"] = $emailto;
        else
            $return["emails"] = $emails;
        return $return;
    }

}