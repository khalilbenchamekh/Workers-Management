<?php

namespace AppBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PartParamsController extends Controller
{
    /**
     * @Route("/Admin/part/{id}/Para", name="user_parapart")
     */
    public function UserParaPartAction(Request $request , $id)
    {
        return $this->redirect( $this->generateUrl('admin_users', ["userType" => "part"] ));
    }
}
