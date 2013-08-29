<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class AdmUserIdentity extends CUserIdentity
{
        private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$users = AdmAccess::model()->getUserForLogin($this->username);
		if($users == NULL)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users->password !== AdmAccess::model()->getHashPasswd($this->password, $this->username))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
                    $this->_id=$users->id;
                    $this->setState('username', $users->username);
                    $this->setState('email', $users->email);
                    $this->errorCode=self::ERROR_NONE;
                }
		return !$this->errorCode;
	}
        
        /**
        * @return integer the ID of the user record
        */
       public function getId()
       {
           return $this->_id;
       }
}