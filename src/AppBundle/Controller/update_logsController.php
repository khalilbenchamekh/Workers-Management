<?php

namespace AppBundle\Controller;

use AppBundle\Entity\update_logs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Update_log controller.
 *
 * @Route("Admin/Logs")
 */
class update_logsController extends Controller
{
    /**
     * Lists all update_log entities.
     * @Route("/", name="Admin_Logs_index")
     * @Route("/of/{user_id}", name="Admin_Logs_index_user")
     * @Method("GET")
     */
    public function indexAction($user_id = null)
    {
        $em = $this->getDoctrine()->getManager();
        $update_logs = $em->getRepository('AppBundle:update_logs')->getAllByOrderByUser('DESC' ,$user_id);
        $update_logs_servic = $this->get('app.update_logs_service');
        $stat['nbvalide'] = $update_logs_servic->getCountUpdatesForOneUser($user_id , 'valide');
        $stat['nbnonvalide'] = $update_logs_servic->getCountUpdatesForOneUser($user_id);
        $stat['nberror']=  $update_logs_servic->getCountUpdatesForOneUser($user_id , 'error');
//        echo" <pre>";
//        var_dump($stat);
//        die();
        return $this->render('update_logs/index.html.twig', array(
            'update_logs' => $update_logs,
            'stat' => $stat
        ));
    }
    /**
     * Creates a new update_log entity.
     *
     * @Route("/new", name="Admin_Logs_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $update_log = new update_logs();
        $form = $this->createForm('AppBundle\Form\update_logsType', $update_log);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($update_log);
            $em->flush();

            return $this->redirectToRoute('Admin_Logs_show', array('id' => $update_log->getId()));
        }

        return $this->render('update_logs/new.html.twig', array(
            'update_log' => $update_log,
            'form' => $form->createView(),
        ));
    }
    /**
     * Finds and displays a update_log entity.
     *
     * @Route("/{id}", name="Admin_Logs_show")
     * @Method("GET")
     */
    public function showAction(update_logs $update_log)
    {
        $deleteForm = $this->createDeleteForm($update_log);

        return $this->render('update_logs/show.html.twig', array(
            'update_log' => $update_log,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Valide une modification
     * @Route("/valide/{id}" , name="Admin_Logs_valide")
     * @Method("GET")
     */
    public function valideAction(update_logs $update_logs ){
        $return = $this->get("app.update_logs_service")->valideLog($update_logs);
        if($return['error']['existe']){
            $this->get('session')->getFlashBag()->add('error', $return['error']['msg']);
            $this->get('logger')->error($return['error']['msg']);

        }else{
            $this->get('session')->getFlashBag()->add('msgs', $return['isUpdate'] ? "la modification a ete efficteur a la base de Gramweb." : "La modification na pas ete efficteur a la base de Gramweb.");
            $this->get('session')->getFlashBag()->add('msgs', $return['isUpdate'] ? "\xALa validation de la modification num = ".$update_logs->getId()." a tirmier avec sucssic." : "\xALa validation de la modification num = ".$update_logs->getId()." est imposible.");
        }
        return $this->redirect($this->generateUrl('Admin_Logs_index_user' , ['user_id' => $update_logs->getUserId() ]));
    }
    /**
     * Valide une modification
     * @Route("/nonvalide/{id}" , name="Admin_Logs_non_valide")
     * @Method("GET")
     */
    public function  nonValideAction(update_logs $update_logs){
        $this->get("app.update_logs_service")->valideLog($update_logs , "non valide");
        return $this->redirect($this->generateUrl('Admin_Logs_index'));
    }
    /**
     * Displays a form to edit an existing update_log entity.
     *
     * @Route("/{id}/edit", name="Admin_Logs_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, update_logs $update_log)
    {
        $deleteForm = $this->createDeleteForm($update_log);
        $editForm = $this->createForm('AppBundle\Form\update_logsType', $update_log);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Admin_Logs_show', array('id' => $update_log->getId()));
        }

        return $this->render('update_logs/edit.html.twig', array(
            'update_log' => $update_log,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a update_log entity.
     *
     * @Route("/{id}", name="Admin_Logs_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, update_logs $update_log)
    {
        $form = $this->createDeleteForm($update_log);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($update_log);
            $em->flush();
        }

        return $this->redirectToRoute('Admin_Logs_index');
    }

    /**
     * @Route("/Delete/{id}" , name="Admin_Logs_delete")
     * @Method("GET")
     * @param update_logs $update_log
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteFromTableAction( update_logs $update_log){
        $em = $this->getDoctrine()->getManager();
        $em->remove($update_log);
        $em->flush();
        return $this->redirectToRoute('Admin_Logs_index');
    }
    /**
     * Creates a form to delete a update_log entity.
     *
     * @param update_logs $update_log The update_log entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(update_logs $update_log)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Admin_Logs_delete', array('id' => $update_log->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
