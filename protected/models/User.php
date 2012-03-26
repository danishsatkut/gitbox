<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $salt
 * @property string $email
 * @property string $title
 * @property string $realname
 * @property string $url
 * @property string $facebook
 * @property string $twitter
 * @property string $linkedin
 * @property string $skype
 * @property string $jabber
 * @property string $icq
 * @property string $msn
 * @property string $aim
 * @property string $yahoo
 * @property string $location
 * @property string $signature
 * @property integer $disp_topics
 * @property integer $disp_posts
 * @property integer $email_setting
 * @property integer $notify_with_post
 * @property integer $auto_notify
 * @property integer $show_smilies
 * @property integer $show_img
 * @property integer $show_img_sig
 * @property integer $show_avatars
 * @property integer $show_sig
 * @property integer $access_keys
 * @property double $timezone
 * @property integer $dst
 * @property string $time_format
 * @property string $date_format
 * @property string $language
 * @property string $style
 * @property string $num_posts
 * @property string $last_post
 * @property string $last_search
 * @property string $last_email_sent
 * @property string $registered
 * @property string $registration_ip
 * @property string $last_visit
 * @property string $admin_note
 * @property string $activate_string
 * @property string $activate_key
 * @property integer $avatar
 * @property integer $avatar_width
 * @property integer $avatar_height
 * 
 * @todo Remove all the extra properties from the User model. Also make all code
 * to reflect these changes.
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
			array('disp_topics, disp_posts, email_setting, notify_with_post, auto_notify, show_smilies, show_img, show_img_sig, show_avatars, show_sig, access_keys, dst, avatar, avatar_width, avatar_height', 'numerical', 'integerOnly'=>true),
			array('timezone', 'numerical'),
			array('group_id, time_format, date_format, num_posts, last_post, last_search, last_email_sent, registered, last_visit', 'length', 'max'=>10),
			array('username', 'length', 'max'=>200),
			array('password, realname', 'length', 'max'=>40),
			array('salt, icq', 'length', 'max'=>12),
			array('email, jabber, msn, activate_string', 'length', 'max'=>80),
			array('title', 'length', 'max'=>50),
			array('url, facebook, twitter, linkedin, skype', 'length', 'max'=>100),
			array('aim, yahoo, location, admin_note', 'length', 'max'=>30),
			array('language, style', 'length', 'max'=>25),
			array('registration_ip', 'length', 'max'=>39),
			array('activate_key', 'length', 'max'=>8),
			array('signature', 'safe'),
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
			'group_id' => 'Group',
			'username' => 'Username',
			'password' => 'Password',
			'salt' => 'Salt',
			'email' => 'Email',
			'title' => 'Title',
			'realname' => 'Realname',
			'url' => 'Url',
			'facebook' => 'Facebook',
			'twitter' => 'Twitter',
			'linkedin' => 'Linkedin',
			'skype' => 'Skype',
			'jabber' => 'Jabber',
			'icq' => 'Icq',
			'msn' => 'Msn',
			'aim' => 'Aim',
			'yahoo' => 'Yahoo',
			'location' => 'Location',
			'signature' => 'Signature',
			'disp_topics' => 'Disp Topics',
			'disp_posts' => 'Disp Posts',
			'email_setting' => 'Email Setting',
			'notify_with_post' => 'Notify With Post',
			'auto_notify' => 'Auto Notify',
			'show_smilies' => 'Show Smilies',
			'show_img' => 'Show Img',
			'show_img_sig' => 'Show Img Sig',
			'show_avatars' => 'Show Avatars',
			'show_sig' => 'Show Sig',
			'access_keys' => 'Access Keys',
			'timezone' => 'Timezone',
			'dst' => 'Dst',
			'time_format' => 'Time Format',
			'date_format' => 'Date Format',
			'language' => 'Language',
			'style' => 'Style',
			'num_posts' => 'Num Posts',
			'last_post' => 'Last Post',
			'last_search' => 'Last Search',
			'last_email_sent' => 'Last Email Sent',
			'registered' => 'Registered',
			'registration_ip' => 'Registration Ip',
			'last_visit' => 'Last Visit',
			'admin_note' => 'Admin Note',
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
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('group_id',$this->group_id,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('realname',$this->realname,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('twitter',$this->twitter,true);
		$criteria->compare('linkedin',$this->linkedin,true);
		$criteria->compare('skype',$this->skype,true);
		$criteria->compare('jabber',$this->jabber,true);
		$criteria->compare('icq',$this->icq,true);
		$criteria->compare('msn',$this->msn,true);
		$criteria->compare('aim',$this->aim,true);
		$criteria->compare('yahoo',$this->yahoo,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('signature',$this->signature,true);
		$criteria->compare('disp_topics',$this->disp_topics);
		$criteria->compare('disp_posts',$this->disp_posts);
		$criteria->compare('email_setting',$this->email_setting);
		$criteria->compare('notify_with_post',$this->notify_with_post);
		$criteria->compare('auto_notify',$this->auto_notify);
		$criteria->compare('show_smilies',$this->show_smilies);
		$criteria->compare('show_img',$this->show_img);
		$criteria->compare('show_img_sig',$this->show_img_sig);
		$criteria->compare('show_avatars',$this->show_avatars);
		$criteria->compare('show_sig',$this->show_sig);
		$criteria->compare('access_keys',$this->access_keys);
		$criteria->compare('timezone',$this->timezone);
		$criteria->compare('dst',$this->dst);
		$criteria->compare('time_format',$this->time_format,true);
		$criteria->compare('date_format',$this->date_format,true);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('style',$this->style,true);
		$criteria->compare('num_posts',$this->num_posts,true);
		$criteria->compare('last_post',$this->last_post,true);
		$criteria->compare('last_search',$this->last_search,true);
		$criteria->compare('last_email_sent',$this->last_email_sent,true);
		$criteria->compare('registered',$this->registered,true);
		$criteria->compare('registration_ip',$this->registration_ip,true);
		$criteria->compare('last_visit',$this->last_visit,true);
		$criteria->compare('admin_note',$this->admin_note,true);
		$criteria->compare('activate_string',$this->activate_string,true);
		$criteria->compare('activate_key',$this->activate_key,true);
		$criteria->compare('avatar',$this->avatar);
		$criteria->compare('avatar_width',$this->avatar_width);
		$criteria->compare('avatar_height',$this->avatar_height);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}