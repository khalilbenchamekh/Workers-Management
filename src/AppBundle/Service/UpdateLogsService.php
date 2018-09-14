<?php
/**
 * Created by PhpStorm.
 * User: G CONCEPT
 * Date: 09/10/2017
 * Time: 17:01
 */

namespace AppBundle\Service;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\update_logs;
use Symfony\Component\Validator\Constraints\DateTime;
use Doctrine\ORM\Query\ResultSetMapping;


class UpdateLogsService
{
    protected $em;
    protected $emgw;
    public function __construct(EntityManager $entityManager,EntityManager $emgw)
    {
        $this->em = $entityManager;
        $this->emgw = $emgw;
    }
    /**
     * @param $user_gw_id
     * @param $table_name
     * @param $row_id
     * @param $champ_name
     * @param $value
     * @param $user_id
     * @param string $user_type
     * @param string $statu
     * @return bool
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function addLog($user_gw_id , $table_name , $row_id , $champ_name , $value , $user_id , $user_type = "parent" , $statu = "nonvalide"){
        $update_log = new update_logs();
        $update_log->setUserGwId($user_gw_id)->setTableName($table_name)->setRowid($row_id)->setChampName($champ_name)
            ->setValue($value)->setUserId($user_id)->setUserType($user_type)->setStatu($statu)
            ->setCommante("l'utilistaur ".$user_id." de type ".$user_type." a modifié le champ '".$champ_name."' dans la table '".$table_name."' le ".date('Y-m-d'))
            ->setInsertDate(new \DateTime());
        $this->em->persist($update_log);
        $this->em->flush();
        return true;
    }

    /**
     * @param update_logs $update_log
     * @param string $statu
     * @return array
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function valideLog( update_logs $update_log , $statu = "valide"){
        $isUpdate = 0 ;
        $return = [];
        $return['error']['existe'] = false;
        try{
            $sql = 'UPDATE '.$update_log->getTableName().' g SET g.'.$update_log->getChampName() .' = :value WHERE g.id = :rowid ';
            $params = array('value'=>$update_log->getValue(), 'rowid'=>$update_log->getRowid());
            $stmt = $this->emgw->getConnection()->prepare($sql);
            $isUpdate = $stmt->execute($params);
        }
        catch(\Doctrine\ORM\ORMException $e){
            $return['error']['existe'] = true;
            $return['error']['msg'] = $e->getMessage();
        } catch(\Exception $e){
            $return['error']['existe'] = true;
            $return['error']['msg'] = $e->getMessage();
        }
        if(!$isUpdate) $statu = 'error';
        $update_log->setStatu($statu);
        $this->em->persist($update_log);
        $this->em->flush();
        $return += [ 'isUpdate' => $isUpdate , 'isValided' => true ];
        return $return;
    }
    /**
     * @param update_logs $update_log
     * @return string
     */
    public function getLogSqlQuery( update_logs $update_log  ){
        return'UPDATE '.$update_log->getTableName().' g SET g.'.$update_log->getChampName() .' = '.$update_log->getValue().' WHERE g.id = '.$update_log->getRowid().' ; ';
    }
    /**
     * @param $en
     * @return array
     */
    public function getEntityFildes( $en  , $em = null ){
        if( $em == null )
            $class = $this->em->getClassMetadata($en);
        elseif( $em == "gramweb")
            $class = $this->emgw->getClassMetadata($en);
        $fields = [];
        if (!empty($class->discriminatorColumn)) {
            $fields[] = strtolower($class->discriminatorColumn['name']);
        }
        $fields = array_merge($class->getColumnNames(), $fields);
        foreach ($fields as $index => $field) {
            if ($class->isInheritedField($field)) {
                unset($fields[$index]);
            }
        }
        foreach ($class->getAssociationMappings() as $name => $relation) {
            if (!$class->isInheritedAssociation($name)){
                foreach ($relation['joinColumns'] as $joinColumn) {
                    $fields[] = strtolower($joinColumn['name']);
                }
            }
        }
        return $fields;
    }
    /**
     * @param $en
     * @param $oldObj
     * @param $newObj
     * @param null $em
     * @return mixed
     */
    public function getUpdatedFields( $en , $oldObj , $newObj , $em = null){
        $fields_Updated = [];
        $fields_Updated_vals = [];
        $fields = $this->getEntityFildes($en , $em);
        foreach ($fields as $f ){
            $f =strtolower($f);
            $f = substr($f ,-3 ) == '_id' ? substr($f , 0 , strlen($f) -3 ) : $f ;
            if( $oldObj[$f] != $newObj[$f]){
                if(is_array($oldObj[$f])){
                    $fields_Updated[] = $f."_id";
                    $fields_Updated_vals[$f."_id"] = $oldObj[$f]['id'];
                }else{
                    $fields_Updated[] = $f;
                    $fields_Updated_vals[$f] = $oldObj[$f];
                }
            }
        }
        $result['fields_updated'] = $fields_Updated;
        $result['fields_updated_vals'] = $fields_Updated_vals;
//        $result['fields'] = $fields;
//        $result['oldObj'] = $oldObj;
//        $result['newObj'] = $newObj;
        return $result;
    }
    /**
     * @param $user_id
     * @param string $statut
     * @return int
     */
    public function getCountUpdatesForOneUser( $user_id , $statut = "nonvalide"){
       $result = $this->em->getRepository('AppBundle:update_logs')->findBy( ['userId' => $user_id , 'statu' => $statut]);
       return count($result);
    }

}