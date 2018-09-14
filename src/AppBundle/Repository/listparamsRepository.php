<?php

namespace AppBundle\Repository;

/**
 * listparamsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class listparamsRepository extends \Doctrine\ORM\EntityRepository
{

    /**
     * @listparams $id
     * @listparams $usertype
     * @return array
     */
    public function getParasAsJsonArray($usertype , $id)
    {
        $listPara = $this->findOneBy( [ 'id' => $id , 'usertype' => $usertype ] );

        $params = $listPara->getParameters();
        $rtnpara = [];
        foreach ( $params as $p){
            $rtnpara[$p->getColumnTitle()] = [
                "id" => $p->getId(),
                "dispaly" => $p->getDispaly(),
                "allowUpdate" => $p->getAllowUpdate(),
                "allowInsert" => $p->getAllowInsert(),
                "allowDelete" => $p->getAllowDelete(),
            ];
        }
        return $rtnpara;
    }
}
