<?php

class AdmAccess
{
    private static $_model = array();
    
    public static function model($className=__CLASS__)
    {
        if(empty(self::$_model[$className]))
            self::$_model[$className] = new $className;
        return self::$_model[$className];
    }
    
    public function getUserForLogin($email){
        return Users::model()->find('email=:email AND roles=:roles',
                        array(
                            ':email'=>$email,
                            ':roles'=>Users::ROLES_ADM
                        ));
    }
    
    public function getHashPasswd($password, $email){
        return Users::model()->getHashPasswd($password, $email);
    }
    
    public function accessAdmin($uid = false){
        if(!$uid && !Yii::app()->user->isGuest)
            $uid = Yii::app()->user->id;
            
        if($uid){
            $model = Users::model()->findByPk($uid);
            if($model != NULL)
                return ($model->roles == Users::ROLES_ADM)? true: false;
        }
        
        return false;
        
    }
}