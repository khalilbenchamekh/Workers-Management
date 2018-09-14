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
use AppBundle\Form\GwParentType;
use AppBundle\Form\GwResponsable1Type;
use AppBundle\Form\GwResponsable2Type;
use AppBundle\Form\GwEnfantType;
use AppBundle\Form\GwEnfantacceuilType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;


class EditFamController extends Controller
{
    /**
     * @Route("/Parent/EditInformations ", name="editInfoGenirale")
     */
    public function editInfosAction(Request $request)
    {
        $this_GW_UserId =$this->getuser()->getp_a_pt_id();
        $ParentGwRepo = $this->getDoctrine()->getRepository('AppBundle:GwParent', 'gramweb');
        $emgw = $this->get('doctrine')->getManager('gramweb');
        $parent = $ParentGwRepo->findOneById($this_GW_UserId);
        $form = $this->createForm(GwParentType::class , $parent , array('method' => 'POST') );
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $parent = $form->getData();

            $emgw->persist($parent);
            $emgw->flush();
            $this->get('session')->getFlashBag()->add('msgs', 'Informations generales ont éte enregistré avec succès . ');
            return $this->redirectToRoute('accueil');
        }
        return $this->render('Formes/parent/editInfoGenirale.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'ParentForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/Parent/editResp1/{id} ", name="editResp1")
     */
    public function editResp1Action(Request $request , $id)
    {
        $emgw = $this->get('doctrine')->getManager('gramweb');

        $Resp1Reposp = $this->getDoctrine()->getRepository('AppBundle:GwResponsable1', 'gramweb');
        $Resp1 = $Resp1Reposp->findOneById($id);
        $form = $this->createForm(GwResponsable1Type::class , $Resp1);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $Resp1 = $form->getData();
            $Resp1->setVilleId($Resp1->getVille()->getId());
            $Resp1->setVille($Resp1->getVille()->getNom());
            $emgw->persist($Resp1);
            $emgw->flush();

            $this->get('session')->getFlashBag()->add('msgs', 'Les informations de responsable 1 ont éte modifier avec succès . ');
            return $this->redirectToRoute('resp1');
        }
        return $this->render('Formes/parent/editRespo1.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'ParentForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/Parent/editResp2/{id} ", name="editResp2")
     */
    public function editResp2Action(Request $request , $id)
    {
        $emgw = $this->get('doctrine')->getManager('gramweb');

        $Resp2Reposp = $this->getDoctrine()->getRepository('AppBundle:GwResponsable2', 'gramweb');
        $Resp2 = $Resp2Reposp->findOneById($id);
        $form = $this->createForm(GwResponsable2Type::class , $Resp2);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $Resp2 = $form->getData();
            $Resp2->setVilleId($Resp2->getVille()->getId());
            $Resp2->setVille($Resp2->getVille()->getNom());
            $emgw->persist($Resp2);
            $emgw->flush();

            $this->get('session')->getFlashBag()->add('msgs', 'Les informations de responsable 2 ont éte modifier avec succès . ');
            return $this->redirectToRoute('resp1');
        }
        return $this->render('Formes/parent/editRespo2.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'ParentForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/Parent/enfant/{id}/edit", name="edit_enfant")
     */
    public function showEnfantAction(Request $request , $id)
    {
        $emgw = $this->get('doctrine')->getManager('gramweb');

        $Enfant = $emgw->getRepository('AppBundle:GwEnfant', 'gramweb')->findOneById( $id );

        $form = $this->createForm(GwEnfantType::class , $Enfant);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $Enfant = $form->getData();
            $emgw->persist($Enfant);
            $emgw->flush();
            $this->get('session')->getFlashBag()->add('msgs', 'Les informations de l\'enfant [ '.$Enfant->getPrenom().'] ont éte modifier avec succès . ');
            return $this->redirectToRoute('show_enfant' , ['id' => $Enfant->getId()]);
        }
        return $this->render('Formes/parent/editEnfant.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'enfantForm' => $form->createView(),
            'enfantname' => $Enfant->getPrenom()
        ]);
    }

    /**
     * @Route("/Parent/EnfantAm/{id}", name="edit_enf_am"  )
     */
    public function editEnfantAmAction(Request $request , $id)
    {
        $emgw = $this->get('doctrine')->getManager('gramweb');
        //get enf_am where enf = this and agrem = this
        $EnfantsAm = $emgw->getRepository('AppBundle:GwEnfantacceuil', 'gramweb')->findOneById( $id );

//        $amId = $EnfantsAm->getAgrement()->getAssmat()->getId();
        $assmat = $EnfantsAm->getAgrement()->getAssmat();
        $amServece = $this->get('app.assmat_service');
        $ags = $amServece->getAgremets($assmat);
        $form = $this->createForm(GwEnfantacceuilType::class , $EnfantsAm , ["thisAgremets" => $ags ]);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $emgw->persist($EnfantsAm);
            $emgw->flush();
            $this->get('session')->getFlashBag()->add('msgs', 'Les informations de l\'enfant [ '.$EnfantsAm->getEnfant()->getPrenom().'] ont éte modifier avec succès . ');
            return $this->redirectToRoute('show_enfant' , ['id' => $EnfantsAm->getEnfant()->getId()]);
        }
        return $this->render('Formes/parent/editEnfantAm.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'enfantAm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/Services/getAmAgremets/{id}", name="am_agrements" , options={"expose"=true , "method"="POST" }  )
     */
    public function amAgrementsAction($id)
    {
        $ags = $this->get('app.assmat_service')->getAgremets( $this->get('doctrine')->getManager('gramweb')->getRepository('AppBundle:GwAm')->findOneById($id));
        $data = [];
        foreach ( $ags as $ag){
            $data[] = ['id' => $ag->getId(),'name' => $ag->getNom() != null ? $ag->getNom()->getNom(): "" , ];
        }
        return new JsonResponse($data);
    }
    /**
     * @Route("/Services/deleteEnfantAm/{id}", name="delete_enfantAm" , options={"expose"=true }  )
     */
    public function deleteEnfantAmAction($id)
    {
        $emgw = $this->get('doctrine')->getManager('gramweb');
        //get enf_am where enf = this and agrem = this
        $EnfantsAm = $emgw->getRepository('AppBundle:GwEnfantacceuil', 'gramweb')->findOneById( $id );
        $enfId = $EnfantsAm->getEnfant()->getId();
        $enfprenom = $EnfantsAm->getEnfant()->getPrenom();
        $emgw->remove($EnfantsAm);
        $emgw->flush();
        $usertype = $this->getuser()->getusertype();
        if( $usertype == "parent"){
            $this->get('session')->getFlashBag()->add('msgs', 'Les informations de l\'enfant [ '.$enfprenom.'] ont éte modifier avec succès . ');
            return $this->redirectToRoute('show_enfant' , ['id' => $enfId]);
        }elseif ( $usertype == "assmat"){
            $this->get('session')->getFlashBag()->add('msgs', 'L\'Agrement Numéro : '.$EnfantsAm->getAgrement()->getNum().' à éte Modifié avec succès. ');
            return $this->redirectToRoute('show_agrement' , [ 'id' => $EnfantsAm->getAgrement()->getId()]);
        }
    }
    /**
     * @Route("/Services/finContEnfantAm/{id}", name="fin_cont_enf_am" , options={"expose"=true }  )
     */
    public function finContEnfantAmAction($id)
    {
        $emgw = $this->get('doctrine')->getManager('gramweb');
        //get enf_am where enf = this and agrem = this
        $EnfantsAm = $emgw->getRepository('AppBundle:GwEnfantacceuil', 'gramweb')->findOneById( $id );
        $enfId = $EnfantsAm->getEnfant()->getId();
        $enfprenom = $EnfantsAm->getEnfant()->getPrenom();
        $EnfantsAm->setDepart(1);
        $emgw->persist($EnfantsAm);
        $emgw->flush();
        $usertype = $this->getuser()->getusertype();
        if( $usertype == "parent"){
            $this->get('session')->getFlashBag()->add('msgs', 'Les informations de l\'enfant [ '.$enfprenom.'] ont éte modifier avec succès . ');
            return $this->redirectToRoute('show_enfant' , ['id' => $enfId]);
        }elseif ( $usertype == "assmat"){
            $this->get('session')->getFlashBag()->add('msgs', 'L\'Agrement Numéro : '.$EnfantsAm->getAgrement()->getNum().' à éte Modifié avec succès. ');
            return $this->redirectToRoute('show_agrement' , [ 'id' => $EnfantsAm->getAgrement()->getId()]);
        }
    }
}