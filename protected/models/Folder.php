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
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('folderName, folderDescription, dateCreated, dateModified, createdBy_fk, modifiedBy_fk, folderPath', 'required'),
			array('folderName', 'length', 'max'=>30),
			array('createdBy_fk, modifiedBy_fk', 'length', 'max'=>10),
			array('folderPath', 'length', 'max'=>31),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('folderId_pk, folderName, folderDescription, dateCreated, dateModified, createdBy_fk, modifiedBy_fk, folderPath', 'safe', 'on'=>'search'),
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
			'folderId_pk' => 'Folder Id Pk',
			'folderName' => 'Folder Name',
			'folderDescription' => 'Folder Description',
			'dateCreated' => 'Date Created',
			'dateModified' => 'Date Modified',
			'createdBy_fk' => 'Created By Fk',
			'modifiedBy_fk' => 'Modified By Fk',
			'folderPath' => 'Folder Path',
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