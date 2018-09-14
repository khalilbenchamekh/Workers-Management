<?php
namespace AppBundle\UserBundle\Controller;
use FOS\UserBundle\Controller\SecurityController as FOSController;

class SecurityController extends FOSController {
    public function loginAction(\Symfony\Component\HttpFoundation\Request $request){

        $response = parent::loginAction($request);
        //do something else;
//        $fromgramweb = $request->get("fromgramweb");
//        if(isset($fromgramweb) && $fromgramweb  == 1 ){
//            var_dump("dddddd");
//            die();
//        }

        return $response;
     }
}
//
//use FOS\UserBundle\Controller\SecurityController as BaseController;
//
//class SecurityController extends BaseController {
//    public function loginAction(\Symfony\Component\HttpFoundation\Request $request){
//        $response = parent::loginAction($request);
//
//        //do something else;
//
//        return $response;
//    }
//}