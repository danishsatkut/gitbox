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
 * Experimental features: 
 * @property string $activate_string
 * @property string $activate_key
 *
 * 
 * @todo Remove all the extra properties from the User model. Also make all code
 * to reflect these changes.
 * 
 * @todo implementing firstname and lastname in user table in database
 */

class User extends CActiveRecord
{
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
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username', 'length', 'max'=>20),
			array('password, realname', 'length', 'max'=>40),
			array('email', 'length', 'max'=>80),
            
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
}