<?php
/**
 * Created by PhpStorm.
 * User: RABAH Ismail
 * Date: 24/05/2017
 * Time: 10:45
 */
namespace AppBundle\Controller;
use AppBundle\Form\GwAmType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\GwAgrementType;
use AppBundle\Form\GwAmEnfantAcceuilType;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;

class EditAssmatController extends Controller
{
    /**
     * @Route("/Assmat/testo ", name="editAssmattesto")
     */
    public function testo(){
        $em = $this->getDoctrine()->getManager();

        $uploda_log = $em->getRepository('AppBundle:update_logs')->findOneById(3);
        $uploda_log2 = $em->getRepository('AppBundle:update_logs')->findOneById(4);

        $serializer = $this->get('jms_serializer');
        $response = $serializer->toArray($uploda_log );
        $response2 = $serializer->toArray($uploda_log2);

        $result = $this->get('app.update_logs_service')->getUpdatedFields('AppBundle:update_logs' , $response , $response2);
        return $this->render('Formes/assmat/testo.html.twig' , [ 'b'=> $result ]);
    }
    /**
     * @Route("/Assmat/EditInfo ", name="editAssmatInfo")
     */
    public function indexAction(Request $request)
    {
        $this_GW_UserId =$this->getuser()->getp_a_pt_id();
        $AssmatGwRepo = $this->getDoctrine()->getRepository('AppBundle:GwAm', 'gramweb');
        $emgw = $this->get('doctrine')->getManager('gramweb');
        $Assmat = $AssmatGwRepo->findOneById($this_GW_UserId);

        $serializer = SerializerBuilder::create()->setSerializationContextFactory(function () {return SerializationContext::create()  ->setSerializeNull(true);})->build();
        $response = $serializer->toArray($Assmat );

        $form = $this->createForm(GwAmType::class , $Assmat , array('method' => 'POST') );
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $Assmat = $form->getData();
//            $emgw->persist($Assmat);
//            $emgw->flush();

            $update_logs_service = $this->get('app.update_logs_service');
            $response2 = $serializer->toArray($Assmat);
            $result = $update_logs_service->getUpdatedFields('AppBundle:GwAm' , $response2 , $response , 'gramweb');
            if($result['fields_updated']){
                foreach ($result['fields_updated'] as $f){
                    $update_logs_service->addLog(
                        $this_GW_UserId,
                        "gw_am",
                        $Assmat->getId(),
                        $f,
                        $result['fields_updated_vals'][$f],
                        $this->getUser()->getId(),
                        "assmat"
                    );
                }
            }
            $this->get('session')->getFlashBag()->add('msgs', 'Informations generales ont éte enregistré avec succès . ');
            return $this->redirectToRoute('assmataccueil');
        }
        return $this->render('Formes/assmat/editAssmatInfo.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'AssmatForm' => $form->createView()
        ]);
    }
    /**
     * @Route("/Assmat/agrements/{id}/edit ", name="edit_agrement")
     */
    public function editAgrmentAction(Request $request , $id)
    {
        $emgw = $this->get('doctrine')->getManager('gramweb');
        $this_GW_UserId =$this->getuser()->getp_a_pt_id();
        $this_UserId =$this->getuser()->getID();
        //get on agrement bu his id
        $Agrement = $this->getDoctrine()->getRepository('AppBundle:GwAgrement', 'gramweb' )->findOneById($id);
        $serializer = SerializerBuilder::create()->setSerializationContextFactory(function () {return SerializationContext::create()  ->setSerializeNull(true);})->build();
        $response = $serializer->toArray($Agrement );
        $form = $this->createForm(GwAgrementType::class , $Agrement , array('method' => 'POST') );
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $Agrement = $form->getData();
//            $emgw->persist($Agrement);
//            $emgw->flush();

            $update_logs_service = $this->get('app.update_logs_service');
            $response2 = $serializer->toArray($Agrement);
            $result = $update_logs_service->getUpdatedFields('AppBundle:GwAgrement' , $response2 , $response , 'gramweb');
            if($result['fields_updated']){
                foreach ($result['fields_updated'] as $f){
                    $update_logs_service->addLog(
                        $this_GW_UserId,
                        "gw_agrement",
                        $this_UserId,
                        $f,
                        $result['fields_updated_vals'][$f],
                        $this->getUser()->getId(),
                        "assmat"
                    );
                }
            }
            $this->get('session')->getFlashBag()->add('msgs', 'L\'Agrement Numéro : '.$Agrement->getNum().' à éte Modifié avec succès. ');
            return $this->redirectToRoute('show_agrement' , [ 'id' => $Agrement->getId()]);
        }
        return $this->render('Formes/assmat/editAgrment.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'AgremetForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/Assmat/AmEnfant/{edit}/{id}", name="edit_am_enf"  )
     */
    public function editAmEnfantAction(Request $request , $id , $edit  )
    {
        $emgw = $this->get('doctrine')->getManager('gramweb');

        $this_GW_UserId =$this->getUser()->getp_a_pt_id();
        $this_UserId =$this->getUser()->getID();

        //get enf_am where enf = this and agrem = this
        $EnfantsAm = $emgw->getRepository('AppBundle:GwEnfantacceuil', 'gramweb')->findOneById( $id );

        $serializer = SerializerBuilder::create()->setSerializationContextFactory(function () {return SerializationContext::create()  ->setSerializeNull(true);})->build();
        $response = $serializer->toArray($EnfantsAm );

        $form = $this->createForm(GwAmEnfantAcceuilType::class , $EnfantsAm );

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $EnfantsAm = $form->getData();
//            $emgw->persist($EnfantsAm);
//            $emgw->flush();

            $update_logs_service = $this->get('app.update_logs_service');
            $response2 = $serializer->toArray($EnfantsAm);
            $result = $update_logs_service->getUpdatedFields('AppBundle:GwAgrement' , $response2 , $response , 'gramweb');
            if($result['fields_updated']){
                foreach ($result['fields_updated'] as $f){
                    $update_logs_service->addLog(
                        $this_GW_UserId,
                        "gw_enfantacceuil",
                        $EnfantsAm->getId(),
                        $f,
                        $result['fields_updated_vals'][$f],
                        $this_UserId,
                        "assmat"
                    );
                }
            }
            echo '<pre> New data <br>';
            print_r($response2);
            echo '<br> Old Data <br>';
            print_r($response);
            echo '<br> Resultat : <br>';
            echo $response2->getCommentaire() . ' == ' . $response->getCommentaire();
            print_r($result);
            die;
            $this->get('session')->getFlashBag()->add('msgs', 'L\'Agrement Numéro : '.$EnfantsAm->getAgrement()->getNum().' à éte Modifié avec succès. ');
            return $this->redirectToRoute('show_agrement' , [ 'id' => $EnfantsAm->getAgrement()->getId()]);
        }
        return $this->render('Formes/assmat/editAmEnfant.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'enfantAm' => $form->createView(),
            'editIN' => $edit,
        ]);
    }
}