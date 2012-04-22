<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;
    
    public function getId() {
        return $this->_id;  
    }
    
	/**
	 * Authenticates a user.
	 * 
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
            // where $this->username is declared in parent CUserIdentity
            $user = User::model()->findByAttributes(array("email"=>$this->username));
        
            if($user === null)  // user does not exists
                    $this->errorCode=self::ERROR_USERNAME_INVALID;
            else if(!$user->validatePassword($this->password))    // password does not match
                    $this->errorCode=self::ERROR_PASSWORD_INVALID;
            else {
                // Store id and username in sessions
                $this->_id = $user->id;
                $this->username = $user->username;
                $this->errorCode=self::ERROR_NONE;
                
                /*------------------ IMPORTANT --------------------------------
                 * please remove the following code when avatar is implemented
                 */
                $user->avatar = Yii::app()->baseUrl . "/images/user.jpeg";
                /* ---------------------------------------------------------- */
                $this->setState('avatar', $user->avatar);
                $this->setState('email', $user->email);
            }
            return !$this->errorCode;
        }
}