<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
     * 
     * @todo To authenticate via username and password from the database.
     * This username and password is retrieved via User model. The password is
     * in hashed form.
	 */
	public function authenticate()
	{
        // where $this->username is declared in parent CUserIdentity
        $user = User::model()->findByAttributes(array("username"=>$this->username));
        
		if($user === null)  // user does not exists
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($user->password !== sha1($this->password))    // password does not match
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else  // username and password match
			$this->errorCode=self::ERROR_NONE;
        return !$this->errorCode;
    }
}