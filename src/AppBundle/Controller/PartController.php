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

class PartController extends Controller
{
    /**
     * @Route("/Part/PartLogin", name="part_login")
     */
    public function partLoginAction(Request $request)
    {
        return $this->render('userlogin/loginassmat.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/Part/", name="partaccueil")
     */
    public function partaccueilAction(Request $request)
    {
        return $this->render('partpages/partAccueil.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/Part/Fonction", name="partFonction")
     */
    public function partFonctionAction(Request $request)
    {
        return $this->render('partpages/fonction.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/Part/Telechargements", name="Parttelechargement")
     */
    public function ParttelechargementAction(Request $request)
    {
        return $this->render('partpages/Telechargement.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
