<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class GlobaleController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request )
    {
        // $session = $request->getSession();
        $user = $this->getuser();
        // Cheack Connecion
        if($user !=  null){
            //get user Role { ROLE_ADMIN , ROLE_PARENT , ROLE_ASSMAT }
            $userRoles = $user->getRoles();
            //REdirect the Admin
            if(in_array('ROLE_ADMIN', $userRoles)){
                return $this->redirect( $this->generateUrl('Admin', array() ));
            }
            //Rederect  User
            else if ( $user->getusertype() != null and $user->getuser_gw_id() != 0 ){
                // Parent
                if( $user->getusertype() == "parent" and  in_array('ROLE_PARENT', $userRoles) ){
                    $Parent = $this->getDoctrine()->getRepository('AppBundle:GwParent', 'gramweb')->findOneById($user->getp_a_pt_id());
                    if($Parent->getArchived() == 0 )
                        return $this->redirect( $this->generateUrl('famhome', array() ));
                    elseif($Parent->getArchived() == 1 ){
                        $this->get('session')->getFlashBag()->add('err', ' votre compte a ete desactive par l\'administrateur .');
                        return $this->redirect( $this->generateUrl('fos_user_security_logout', array() ));
                    }
                }
                // Assmat
                else if ( $user->getusertype() == "assmat" and  in_array('ROLE_ASSMAT', $userRoles) ){
                    $Assmat = $this->getDoctrine()->getRepository('AppBundle:GwAm', 'gramweb')->findOneById($user->getp_a_pt_id());
                    if($Assmat->getArchive() == 0 )
                        return $this->redirect( $this->generateUrl('amhome', array() ));
                    elseif($Assmat->getArchive() == 1 ){
                        $this->get('session')->getFlashBag()->add('err', ' votre compte a ete desactive par l\'administrateur .');
                        return $this->redirect( $this->generateUrl('fos_user_security_logout', array() ));
                    }
                }
                // Part
                else if ( $user->getusertype() == "part" and  in_array('ROLE_PART', $userRoles) ){
                    $Assmat = $this->getDoctrine()->getRepository('AppBundle:GwPartenaire', 'gramweb')->findOneById($user->getp_a_pt_id());
                    if($Assmat->getArchived() == 0 )
                        return $this->redirect( $this->generateUrl('partaccueil', array() ));
                    elseif($Assmat->getArchived() == 1 ){
                        $this->get('session')->getFlashBag()->add('err', ' votre compte a ete desactive par l\'administrateur .');
                        return $this->redirect( $this->generateUrl('fos_user_security_logout', array() ));
                    }
                }
            }
        }
        else
        {
            return $this->render('default/index.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
                'user' => $user,]);
        }

    }
}
