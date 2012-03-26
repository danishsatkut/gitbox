<?php

/**
 * This is the model class for table "file".
 *
 * The followings are the available columns in table 'file':
 * @property string $fileId_pk
 * @property string $fileName
 * @property string $fileDescription
 * @property string $size
 * @property string $mime
 * @property string $filePath
 * @property string $dateCreated
 * @property string $createdBy_fk
 * @property string $folderId_fk
 */
class File extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return File the static model class
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
		return 'file';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fileName, fileDescription, size, mime, filePath, dateCreated, createdBy_fk, folderId_fk', 'required'),
			array('fileName, mime', 'length', 'max'=>30),
			array('size, createdBy_fk, folderId_fk', 'length', 'max'=>10),
			array('filePath', 'length', 'max'=>31),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fileId_pk, fileName, fileDescription, size, mime, filePath, dateCreated, createdBy_fk, folderId_fk', 'safe', 'on'=>'search'),
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
			'fileId_pk' => 'File Id Pk',
			'fileName' => 'File Name',
			'fileDescription' => 'File Description',
			'size' => 'Size',
			'mime' => 'Mime',
			'filePath' => 'File Path',
			'dateCreated' => 'Date Created',
			'createdBy_fk' => 'Created By Fk',
			'folderId_fk' => 'Folder Id Fk',
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

		$criteria->compare('fileId_pk',$this->fileId_pk,true);
		$criteria->compare('fileName',$this->fileName,true);
		$criteria->compare('fileDescription',$this->fileDescription,true);
		$criteria->compare('size',$this->size,true);
		$criteria->compare('mime',$this->mime,true);
		$criteria->compare('filePath',$this->filePath,true);
		$criteria->compare('dateCreated',$this->dateCreated,true);
		$criteria->compare('createdBy_fk',$this->createdBy_fk,true);
		$criteria->compare('folderId_fk',$this->folderId_fk,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}