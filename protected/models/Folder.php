<?php

/**
 * This is the model class for table "folder".
 *
 * The followings are the available columns in table 'folder':
 * @property string $folderId_pk
 * @property string $folderName
 * @property string $folderDescription
 * @property string $dateCreated
 * @property string $dateModified
 * @property string $createdBy_fk
 * @property string $modifiedBy_fk
 * @property string $folderPath
 */
class Folder extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Folder the static model class
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
		return 'folder';
	}

	/**
	 * @return array validation rules for model attributes.
     * 
     * @todo create a new rule to make sure the folder name is unique in the directory
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('folderName', 'required'),
			array('folderName', 'length', 'max'=>30),
            
            // The following rule should be implemented in order to provide unique
            // folder names in a directory.
            // array('folderName', 'uniqueInDirectory'),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('folderName', 'safe', 'on'=>'search'),
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
            'files' => array(self::HAS_MANY, 'File', 'folderId_fk'),
			'modifiedBy' => array(self::BELONGS_TO, 'User', 'modifiedBy_fk'),
			'owner' => array(self::BELONGS_TO, 'User', 'createdBy_fk'),
			'virtualfolders' => array(self::HAS_MANY, 'Virtualfolder', 'folderId_fk'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'folderName' => 'Folder Name',
			'folderDescription' => 'Folder Description',
			'dateCreated' => 'Date Created',
			'dateModified' => 'Date Modified',
			'createdBy_fk' => 'Created By',
			'modifiedBy_fk' => 'Last Modified By',
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

		$criteria->compare('folderId_pk',$this->folderId_pk,true);
		$criteria->compare('folderName',$this->folderName,true);
		$criteria->compare('folderDescription',$this->folderDescription,true);
		$criteria->compare('dateCreated',$this->dateCreated,true);
		$criteria->compare('dateModified',$this->dateModified,true);
		$criteria->compare('createdBy_fk',$this->createdBy_fk,true);
		$criteria->compare('modifiedBy_fk',$this->modifiedBy_fk,true);
		$criteria->compare('folderPath',$this->folderPath,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}