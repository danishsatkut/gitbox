<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $realname
 * @property integer $avatar
 * @property integer $avatar_width
 * @property integer $avatar_height
 * 
 * New Added:
 * @property string firstname
 * @property string middlename
 * @property string lastname
 *
 * Experimental features: 
 * @property string $activate_string
 * @property string $activate_key
 *
 */

class User extends CActiveRecord
{
    /**
     * @var string Stores the second password 
     */
    public $passwordCompare;
    
    /**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
     * 
     * @todo Dont use username for displaying user data, rather use {firstname,
     * lastname} combo.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs. Only these will be generated in Forms
		return array(
			array('username', 'length', 'max'=>20),
			array('password', 'length', 'max'=>40, 'min'=>8),
            array('password', 'compare', 'compareAttribute'=>'passwordCompare', 'on'=>'register'),
            array('email', 'length', 'max'=>80),
            array('firstname, middlename, lastname', 'length', 'max'=>30),
            array('username, password, email, firstname, lastname', 'required'),
            array('username, email', 'unique'),
            array('email','email'),
            array('passwordCompare', 'required', 'on'=>'register'),
            
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			// array('id, username, email, title, realname' , 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'realname' => 'Realname',
			'activate_string' => 'Activate String',
			'activate_key' => 'Activate Key',
			'avatar' => 'Avatar',
			'avatar_width' => 'Avatar Width',
			'avatar_height' => 'Avatar Height',
            'firstname' => 'First Name',
            'middlename' => 'Middle Name',
            'lastname' => 'Last Name',
            'passwordCompare' => 'Password again',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     * 
     * @todo figure out what CDbCriteria does and also CActiveDataProvider
     * @todo is search really needed
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    /**
     * Validates the password passed in as parameter with the model password.
     * 
     * @return boolean whether password is valid 
     */
    public function validatePassword($password) {
        if($this->password === $this->hashPassword($password)) {
            return true;
        }
        return false;
    }
    
    /**
     * @todo implement the converting of passwords into hashed password via beforeSave
     *  
     */
    private function hashPassword($password) {
        return sha1($password);
    }
    
    /**
     * Hashing the password before saving the model data.
     * 
     * Common hashing before storing the user model data, rather than in each
     * controller.
     * 
     * @return boolean returns whether data should be saved (from parent).
     */
    protected function beforeSave() {
        
        $this->password = $this->hashPassword($this->password);
        // calls the beforeSave of AR
        return parent::beforeSave();
    }
}