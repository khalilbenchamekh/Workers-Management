<?php
/**
 * Created by PhpStorm.
 * User: RABAH Ismail
 * Date: 18/06/2017
 * Time: 15:45
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\GwParent;
use AppBundle\Entity\user_ra;

class sendParentAccesToPpfController extends Controller
{
    /**
     * getPdoCnx() get Pdo connecion instans
     * @return \PDO
     */
    function getPdoCnx(){
        //localhost cnx settings
        //$p = [
        //      'dsn' => "mysql:host=localhost; dbname=relais_assmat",
        //      'username' => "root",
        //      'password' => ""
        //];
        //host cnx settings
        $p = [
            'dsn' => "mysql:host=46.227.22.66; dbname=relais_assmat",
            'username' => "relais_assmat",
            'password' => "relais_assmat69*"
        ];
        $pdo = new \PDO($p['dsn'], $p['username'], $p['password'], array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        return $pdo;
    }
    /**
     * @Route("/Services/gw_ppf", name="gw_ppf")
     */
    function setParentPpfAcce(){
        //Entitys Manager
        $emgw = $this->get('doctrine')->getManager('gramweb');
        $emppf = $this->get('doctrine')->getManager('default');
        //cnx pdo
        $pdo = $this->getPdoCnx();
        //{
            //new Parent has bein created ## $form->handleRequest($request); $form->getData()
            $newParent = new GwParent();
            //$newParent->setInformation(*);
            $newParent->setNumFiche(98065);
            $newParent->setEmailEnvoi("test@liger.com");
            $newParent->setArchived(0);

            $emgw->persist($newParent);
            $emgw->flush();
            //$newParentId = $emgw->->getConnection()->lastInsertId();
            $newParentId = $newParent->getId();
        //}

        $username = "pr".$newParent->getnumFiche();
        $mail = $newParent->getEmailEnvoi();
        if( $mail != "" ){
            $username = $mail ;
        }
        //set passsword
        $passeword = $this->generateMdp(); //call generateMdp from Repository
        //hache password
        // ########-> change this class to GwUsers()
        $user = new user_ra();
        $user->setPlainPassword($passeword);
        //$emgw->persist($user);
        $emppf->persist($user);
        $hachpassword= $user->getPassword();

        //insert query ##
        $req = $pdo->prepare("INSERT INTO user_ra (username, username_canonical , email , email_canonical , enabled ,password , roles , p_a_pt_id , usertype , userkey ) 
                            VALUES (:username,:username_canonical,:email,:email_canonical,:enabled,:password,:roles,:p_a_pt_id,:usertype,:userkey)");

        $req->execute(array(
            "username" => $username,
            "username_canonical" => $username,
            "email" => $mail != '' ? $mail : "",
            "email_canonical" => $mail != '' ? $mail : "",
            "enabled" => !$newParent->getArchived(),
            "password" => $hachpassword,
            "roles" => 'a:1:{i:0;s:11:"ROLE_PARENT";}',//ROLE_ADMIN  ROLE_PARENT  ROLE_ASSMAT//set Rolo
            "p_a_pt_id" => $newParentId,
            "usertype" => "parent",
            "userkey" => $passeword
        ));

        echo"<pre>";
        print_r($newParent);
        print_r($req);
        die();

    }
    /**
     * generateMdp() get password with specific (char limit + numbre limit + samboles limit )
     * @param int $cahlength
     * @param int $intlength
     * @param int $symblength
     * @return string
     */
    public function generateMdp($cahlength = 4, $intlength = 3, $symblength = 1)
    {
        $length = $cahlength;
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $length1 = $intlength;
        $characters1 = '0123456789';
        $characters1Length1 = strlen($characters1);
        $randomString1 = '';
        for ($i = 0; $i < $length1; $i++) {
            $randomString1 .= $characters1[rand(0, $characters1Length1 - 1)];
        }
        $length2 = $symblength;
        $characters2 = '!@#$%&*';
        $charactersL2ength2 = strlen($characters2);
        $randomString2 = '';
        for ($i = 0; $i < $length2; $i++) {
            $randomString2 .= $characters2[rand(0, $charactersL2ength2 - 1)];
        }
        $mdp[0] = $randomString[0];
        $mdp[1] = $randomString[1];
        $mdp[2] = $randomString1[0];
        $mdp[3] = $randomString[2];
        $mdp[4] = $randomString2[0];
        $mdp[5] = $randomString1[1];
        $mdp[6] = $randomString[3];
        $mdp[7] = $randomString1[2];
        return implode("", $mdp);
    }
}
