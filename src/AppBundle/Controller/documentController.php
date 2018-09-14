<?php

namespace AppBundle\Controller;

use AppBundle\Entity\document;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Document controller.
 *
 * @Route("/Admin/document")
 */
class documentController extends Controller
{
    /**
     *
     * @Method({"GET", "POST"})
     * @Route("/ajax/snippet/image/send", name="ajax_snippet_image_send")
     */
    public function ajaxSnippetImageSendAction(Request $request)
    {
        $em = $this->container->get("doctrine.orm.default_entity_manager");

        $document = new Document();
        $media = $request->files->get('file');

        $document->setFile($media);
        $document->setPath($media->getPathName());
        $document->setName($media->getClientOriginalName());
        $document->setTitle($media->getClientOriginalName());
        $document->setCommant($media->getClientOriginalName());
        $document->setCommant($media->getClientOriginalName());
        $document->upload();

        $em->persist($document);
        $em->flush();

        //infos sur le document envoyé
//        var_dump($request->files->get('file'));die;
        return new JsonResponse(array('success' => true));
    }

    /**
     * Lists all document entities.
     *
     * @Route("/", name="document_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $documents = $em->getRepository('AppBundle:document')->findBy(array(), array('id' => 'desc'));

        return $this->render('adminPages/Telechargement.html.twig', array(
            'documents' => $documents,
        ));
    }
    /**
     * Creates a new document entity.
     *
     * @Route("/new", name="document_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $document = new Document();
        $form = $this->createForm('AppBundle\Form\documentType', $document);
        $form->handleRequest($request);

        $handlerDocPara = $request->get("appbundle_doc_");

        $document->setName($document->getFile() != null ? $document->getFile()->getClientOriginalName(): "(NULL)");
        $document->setPath($document->getFile() != null ? $document->getFile()->getRealPath(): "(NULL)");
        $document->setFiletype($document->getFile() != null ?$document->getFile()->getClientOriginalExtension(): "(NULL)");

        if (isset($handlerDocPara)){
            $this->getSelectedDocAccess($handlerDocPara ,$document );
        }
        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $media = $document->getFile();
            $document->setPath($media->getPathName());
            $document->setName($media->getClientOriginalName());
            $document->upload();
            $em->persist($document);
            $em->flush();
            return $this->redirectToRoute('document_show', array('id' => $document->getId()));
        }
        return $this->render('document/new.html.twig', array(
            'document' => $document,
            'form' => $form->createView()
        ));
    }
    /**
     * Finds and displays a document entity.
     *
     * @Route("/{id}", name="document_show")
     * @Method("GET")
     */
    public function showAction(document $document)
    {
        $deleteForm = $this->createDeleteForm($document);

        return $this->render('document/show.html.twig', array(
            'document' => $document,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing document entity.
     *
     * @Route("/{id}/edit", name="document_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, document $document)
    {
        $deleteForm = $this->createDeleteForm($document);
        $editForm = $this->createForm('AppBundle\Form\documentediteType', $document);
        $editForm->handleRequest($request);

        $handlerDocPara = $request->get("appbundle_doc_");

        //Get New Doc Access
        if (isset($handlerDocPara)){
            $this->getSelectedDocAccess($handlerDocPara ,$document );
        }

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('document_show', array('id' => $document->getId()));
        }
        return $this->render('document/edit.html.twig', array(
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a document entity.
     *
     * @Route("/{id}", name="document_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, document $document)
    {
        $form = $this->createDeleteForm($document);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($document);
            $em->flush();
        }
        return $this->redirectToRoute('document_index');
    }

    /**
     * Creates a form to delete a document entity.
     *
     * @param document $document The document entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(document $document)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('document_delete', array('id' => $document->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getRespoName($id){
        $respo1 =  $this->get('doctrine')->getManager('gramweb')->getRepository('AppBundle:GwResponsable1' , 'gramewb')->findOneById($id);
        return $respo1->getNom();
    }

    /**
     * @Route("/Services/getuseroftype/{usertype}", name="getusersoftype" , options={"expose"=true , "method"="GET" }  )
     */
    public function getusersoftypeAction($usertype)
    {
        $userservec = $this->get('app.user_service');
        $data = $userservec->getUsersOfType($usertype);

        return new JsonResponse($data);
    }
    /**
     * @Route("/Services/gettempcol", name="gettempcol" , options={"expose"=true , "method"="GET" }  )
     */
    public function gettempcolAction(Request $request)
    {
        return new JsonResponse(['data' => $this->get('app.parent_generator')->getTempsCol( $request->get("tempsColIds"))]);
    }
    /**
     * get Selected Doc Access
     * @param $handlerData
     */
    private function getSelectedDocAccess($handlerData , $document ){
        $Docaccess = ",";
        if( isset($handlerData["all"])){
            $Docaccess.="all," ;
        }else{
            if( isset($handlerData["parent"])){
                $Docaccess .="parent," ;
            }
            if ( isset($handlerData["assmat"])){
                $Docaccess .="assmat," ;
            }
            if ( isset($handlerData["part"])){
                $Docaccess .="part," ;
            }
            //ids
            if ( isset($handlerData["sparent"])){
                $Docaccess .="sparent,";
                //get array
                if(isset($handlerData["sparentids"])){
                    $document->setSparentids( trim($handlerData['sparentids'],",") );
                }
            }
            if ( isset($handlerData["sassmat"])){
                $Docaccess .="sassmat,";
                //get array
                if(isset($handlerData["sassmatids"])){
                    $document->setSamids( trim($handlerData['sassmatids'],",") );
                    echo $document->getSamids().'<br>';
                }
            }
            if ( isset($handlerData["spart"])){
                $Docaccess .="spart,";
                //get array
                if(isset($handlerData["spartids"])){
                    $document->setSpartids( trim($handlerData['spartids'],",") );
                }
            }
            if ( isset($handlerData["scollectif"])){
                $Docaccess .="scollectif,";
                //get array
                if(isset($handlerData["scollectifids"])){
                    $document->setScollectifids( trim($handlerData['scollectifids'],",") );
                }
            }
        }
        $document->setDocaccess( trim(substr($Docaccess, 0,1) === ',' ?  substr($Docaccess, 1)  :$Docaccess ,",") );
    }
}
