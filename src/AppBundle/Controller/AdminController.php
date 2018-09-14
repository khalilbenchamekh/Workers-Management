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
use AppBundle\Entity\user_ra;
use AppBundle\Entity\GwParent;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder ;
use Symfony\Component\Validator\Constraints\DateTime;

class AdminController extends Controller
{
    /**
     * @Route("/Admin/", name="Admin")
     */
    public function AdminAction(Request $request)
    {
        $thisUserId =$this->getuser()->getuser_gw_id();

        //getign count of users prope the user relaise assmate how is connecteing ( grameweb )
        $UsersRepo = $this->getDoctrine()->getRepository('AppBundle:user_ra', 'default');
        $Parentcount = $UsersRepo->countByGwUserId(0 , "parent");
        $Assmatecount = $UsersRepo->countByGwUserId(0 , "assmat");
        $Partcount = $UsersRepo->countByGwUserId(0, "part");
        $static = ['nb_parents'=>$Parentcount,'nb_assmat' => $Assmatecount , 'nb_part' => $Partcount];

        //getign count users Parent valable in grameweb base , for the user how is connecte
        $ParentGwRepo = $this->getDoctrine()->getRepository('AppBundle:GwParent', 'gramweb');
        $GwNbParents = $ParentGwRepo->countByGwUserId();

        //getign count users Assmat valable in grameweb base , for the user how is connecte
        $AssmatGwRepo = $this->getDoctrine()->getRepository('AppBundle:GwAm', 'gramweb');
        $GwNbAssmat = $AssmatGwRepo->countByGwUserId();

        //getign count users Partenaires valable in grameweb base , for the user how is connecte
        $PartGwRepo = $this->getDoctrine()->getRepository('AppBundle:GwPartenaire', 'gramweb');
        $GwNbPart = $PartGwRepo->countByGwUserId();

        $em = $this->getDoctrine()->getManager();
        $documents = $em->getRepository('AppBundle:document')->getLastDocs(5) ;

        //get laste 15  updates log
        $update_logs = $em->getRepository('AppBundle:update_logs')->getLateseByLimet(6);

        //set varaibles to the viwe
        $static['nb_gw_parents'] = $GwNbParents;
        $static['nb_gw_assmat'] = $GwNbAssmat;
        $static['nb_gw_part'] = $GwNbPart;
        $static['documents'] = $documents;
        $static['update_logs'] = $update_logs;

        // get laset user 
        $lastuser = $UsersRepo->findLast();
        // array_push( $static , $lastuser );
        $static['lastuser'] = $lastuser;

        //get latset 5 docs

        // $DocsRepo = $this->getDoctrine()->getRepository('AppBundle:GwDocuments','gramweb');
        // $Docs = $DocsRepo->getLast5($thisParents);

        return $this->render('adminPages/AdminView.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'static' => $static,
        ]);
    }
    /**
     * @Route("/Admin/Users/{userType}", name="admin_users")
     */
    public function UsersAction(Request $request, $userType )
    {
        //Doctrine Relaise_Assmate
        $emra = $this->get('doctrine')->getManager('default');
        $panleHead = "";
        $gwNbUsers = "#";
        if ( isset($userType) and $userType != "" ) {
            $userType = $request->get('userType');
            // get Parents where usertype == parent && user_gw_id == Grameweb id ( this user user_gw_id)
            if ($userType == "parent" and $userType != "" ) {
                $users = $emra->getRepository('AppBundle:user_ra', 'default')
                ->findBy(
                    array('usertype' => 'parent'  ),
                    array('id' =>'ASC')
                );
                $panleHead.= " > Parents";
                $installroute = "install_parents";
                //getign count users Parent valable in grameweb base , for the user how is connecte
                $ParentGwRepo = $this->getDoctrine()->getRepository('AppBundle:GwParent', 'gramweb');
                $gwNbUsers = $ParentGwRepo->countByGwUserId();
            }
            // get Assmates where usertype == assmat && user_gw_id == Grameweb id ( this user user_gw_id)
            elseif($userType == "assmat" and $userType != ""){
                $users = $emra->getRepository('AppBundle:user_ra', 'default')
                ->findBy(
                    array('usertype' => 'assmat'  ),//, 'user_gw_id' => $this->getuser()->getuser_gw_id()
                    array('id' =>'ASC')
                );
                $panleHead.= " > Assmats";
                $installroute = "install_assmats";
                //getign count users Assmat valable in grameweb base , for the user how is connecte
                $AssmatGwRepo = $this->getDoctrine()->getRepository('AppBundle:GwAm', 'gramweb');
                $gwNbUsers = $AssmatGwRepo->countByGwUserId();
            }

            elseif($userType == "part" and $userType != ""){
                $users = $emra->getRepository('AppBundle:user_ra', 'default')->findByUsertype('part');
                $panleHead.= " > Partenaires";
                $installroute = "install_parts";
                //getign count users Partenaires valable in grameweb base , for the user how is connecte
                $PartGwRepo = $this->getDoctrine()->getRepository('AppBundle:GwPartenaire', 'gramweb');
                $gwNbUsers = $PartGwRepo->countByGwUserId();
            }

            elseif( $userType == "Admins014sz01ir"){
                $users = $emra->getRepository('AppBundle:user_ra', 'default')->findByUsertype('admin');
                $panleHead.= " > Admins";
                $installroute = "install_admins";
                $AdminRposo = $this->getDoctrine()->getRepository('AppBundle:GwUsers', 'gramweb');
                $qb = $AdminRposo->createQueryBuilder('u')->select('count(u.id)');
                $gwNbUsers =  $qb->getQuery()->getSingleScalarResult();
            }
            elseif($userType == "all" and $userType != ""){
                $users = $emra->getRepository('AppBundle:user_ra', 'default')
                ->findBy(
                    array('usertype' => ['assmat' , 'parent' , 'part'] ), // 'user_gw_id' => $this->getuser()->getuser_gw_id()
                    array('id' =>'ASC')
                );
                $installroute = "#";
            }
        }else{
            return $this->redirect( $this->generateUrl('Admin', array() ));
        }
        return $this->render('adminPages/UsersView.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'users' => $users,
            'panleHead' => $panleHead,
            'installroute' => $installroute,
            'gwNbUsers' => $gwNbUsers,
        ]);
    }
    /**
     * @Route("/Admin/Install/Admins014sz01ir", name="install_admins")
     */
    public function InstallAdminUser(Request $request){
        $emra = $this->get('doctrine')->getManager('default');
        $emgw = $this->get('doctrine')->getManager('gramweb');
        $raAdminIds = $emra->getRepository('AppBundle:user_ra' , 'default')->getAllIds('admin');
        //get Admin from gramweb database
//        echo '<pre>';
//        var_dump($raAdminIds);
//        die();
        $Admins = $emgw->getRepository('AppBundle:GwUsers', 'gramweb')->findAll();
        foreach ( $Admins as $adm ){
            if($raAdminIds == null || !in_array( $adm->getId() , $raAdminIds) ){
                //set User Admin Infors
                $newUser = new user_ra();
                $newUser->setusertype("admin");
                $newUser->setuser_gw_id(1);
                $newUser->setp_a_pt_id($adm->getId());
                $newUser->setemail($adm->getEmail());
                $newUser->setusernameCanonical($adm->getEmail());
                $newUser->setusername($adm->getUsername());
                $newUser->setusernameCanonical($adm->getUsername());
                $newUser->setenabled($adm->getEnabled());
                $newUser->setroles(array('ROLE_ADMIN'));//ROLE_ADMIN  ROLE_PARENT  ROLE_ASSMAT
                $newUser->setuserkey($adm->getPlainpassword());
                $newUser->setPlainPassword( $adm->getPlainpassword());
                $newUser->setDateMAJ(new \DateTime());
                var_dump($newUser->getusername());
                var_dump($newUser->getEmail());
                $emra->persist($newUser);
                $emra->flush();
            }
            //TODO: ELSE DELET THE USER ( if the user has being deleted in Gramweb Remove OR Archived the user acces in PPF)
        }
        return $this->redirect( $this->generateUrl('Admin', array()));
    }
    /**
     * @Route("/Admin/Install/Parents", name="install_parents")
     */
    public function InstallParentsAction(Request $request)
    {
        $emra = $this->get('doctrine')->getManager('default');
        $emgw = $this->get('doctrine')->getManager('gramweb');
        $UsersRepo = $this->getDoctrine()->getRepository('AppBundle:user_ra', 'default');
        $Parnet = $emgw->getRepository('AppBundle:GwParent', 'gramweb')->getparents();
        $allIds = $UsersRepo->getAllIds("parent");
        foreach ($Parnet as $p) {
            if( $allIds == null || !in_array($p->getId() , $allIds)  ){
                $newuser = new user_ra();
                $newuser->setusertype("parent");
                $newuser->setuser_gw_id( ($p->getUser() != null)?  $p->getUser()->getId() : 1  );
                $newuser->setp_a_pt_id( $p->getid() );
                $username = "pr".$p->getnumFiche();
                $mail = $p->getEmailEnvoi();
                // $mail1 = $p->getResponsable1()->getAdresseMail();
                // $mail2 = $p->getResponsable2()->getAdresseMail();
                if( $mail != "" ){
                    $username = $mail ;
                    $newuser->setemail($mail);
                    $newuser->setusernameCanonical($mail);
                }
                // elseif( $mail1 != ""){
                //     $username = $mail1 ;
                //     $newuser->setemail($mail1);
                //     $newuser->setusernameCanonical($mail1);
                // }elseif( $mail2 != ""){
                //     $username = $mail2 ;
                //     $newuser->setemail($mail2);
                //     $newuser->setusernameCanonical($mail2);
                // }
                $newuser->setusername($username);
                $newuser->setusernameCanonical($username);
                $newuser->setenabled(! $p->getArchived());
                $newuser->setroles(array('ROLE_PARENT'));//ROLE_ADMIN  ROLE_PARENT  ROLE_ASSMAT
                //set passsword
                $passeword = $UsersRepo->generateMdp();
                $newuser->setuserkey($passeword);
                $newuser->setPlainPassword( $passeword);
                $newuser->setDateMAJ(new \DateTime());
                $emra->persist($newuser);
                $emra->flush();
            }
            //TODO: ELSE DELET THE USER ( if the user has being deleted in Gramweb Remove OR Archived the user acces in PPF)
        }
        return $this->redirect( $this->generateUrl('admin_users', array('userType'=> 'parent') ));
    }
    /**
     * @Route("/Admin/Install/Assmats", name="install_assmats")
     */
    public function InstallAssmatsAction(Request $request)
    {
        $emra = $this->get('doctrine')->getManager('default');
        $emgw = $this->get('doctrine')->getManager('gramweb');
        $thisUserIdGw =$this->getuser()->getuser_gw_id();
        $UsersRepo = $this->getDoctrine()->getRepository('AppBundle:user_ra', 'default');
        $allIds = $UsersRepo->getAllIds("assmat");
        $Assmats = $emgw->getRepository('AppBundle:GwAm', 'gramweb')->findAll();
        foreach ($Assmats as $ass) {
            if( $allIds == null || !in_array($ass->getId() , $allIds) ){
                $newuser = new user_ra();
                $newuser->setusertype("assmat");
                $newuser->setuser_gw_id( ($ass->getUser() != null)?  $ass->getUser()->getId() : 1  );
                $newuser->setp_a_pt_id( $ass->getid() );
                $username = "as".$ass->getNumFichie();
                $mail = $ass->getAdresseMail();
                $mail1 = $ass->getEmailEnvoi();
                if ($mail != "" ) {
                    $username = $mail;
                    $newuser->setemail($mail);
                    $newuser->setusernameCanonical($mail);
                }elseif ($mail1 != "" ) {
                    $username = $mail1;
                    $newuser->setemail($mail1);
                    $newuser->setusernameCanonical($mail1);
                }
                $newuser->setusername($username );
                $newuser->setusernameCanonical( $username);
                $newuser->setenabled(1);
                $newuser->setroles(array('ROLE_ASSMAT'));//    ROLE_ADMIN    ROLE_PARENT    ROLE_ASSMAT    ROLE_PART
                $passeword = $UsersRepo->generateMdp();
                $newuser->setuserkey($passeword);
                $newuser->setPlainPassword( $passeword);
                $newuser->setDateMAJ( new \DateTime());
                $emra->persist($newuser);
                $emra->flush();
            }
            //TODO: ELSE DELET THE USER ( if the user has being deleted in Gramweb Remove OR Archived the user acces in PPF)
        }
         return $this->redirect( $this->generateUrl('admin_users', array('userType'=> 'assmat') ));
    }
    /**
     * @Route("/Admin/Install/Parts", name="install_parts")
     */
    public function InstallPartsAction(Request $request)
    {
        $emra = $this->get('doctrine')->getManager('default');
        $emgw = $this->get('doctrine')->getManager('gramweb');
        $thisUserIdGw =$this->getuser()->getuser_gw_id();
        $UsersRepo = $this->getDoctrine()->getRepository('AppBundle:user_ra', 'default');
        $allIds = $UsersRepo->getAllIds("part");
        $Parts = $emgw->getRepository('AppBundle:GwPartenaire', 'gramweb')->findAll();
        foreach ($Parts as $pt) {
            if( $allIds == null || !in_array($pt->getId() , $allIds )  ){
                $newuser = new user_ra();
                $newuser->setusertype("part");
                $newuser->setuser_gw_id( ($pt->getUser() != null)?  $pt->getUser()->getId() : 1  );
                $newuser->setp_a_pt_id( $pt->getid() );
                $username = "pt".$pt->getnum_fiche();
//                $username = "pt".$pt->getId() ;
                $mail = $pt->getMail();
                if ($mail != "" ) {
                    $username = $mail;
                    $newuser->setemail($mail);
                    $newuser->setusernameCanonical($mail);
                }
                $newuser->setusername($username );
                $newuser->setusernameCanonical( $username);
                $newuser->setenabled(1);
                $newuser->setroles(array('ROLE_PART'));//    ROLE_ADMIN    ROLE_PARENT    ROLE_ASSMAT    ROLE_PART
                $passeword = $UsersRepo->generateMdp();
                $newuser->setuserkey($passeword);
                $newuser->setPlainPassword( $passeword);
                $newuser->setDateMAJ( new \DateTime());
                $emra->persist($newuser);
                $emra->flush();
            }
            //TODO: ELSE DELET THE USER ( if the user has being deleted in Gramweb Remove OR Archived the user acces in PPF)
        }
         return $this->redirect( $this->generateUrl('admin_users', array('userType'=> 'part') ));
    }
     /**
     * @Route("/Admin/Telechargements", name="admintelechargement")
     */
    public function telechargementAction(Request $request)
    {
        return $this->render('adminPages/Telechargement.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/Admin/Telechargements/add", name="adminaddtelechargement")
     */
    public function addTelechargementAction(Request $request)
    {
        return $this->render('adminPages/AddTelechargement.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}