<?php

/**
 * This is the model class for table "virtualfolder".
 *
 * The followings are the available columns in table 'virtualfolder':
 * @property string $virtualFolderId_pk
 * @property string $userId_fk
 * @property string $folderId_fk
 * @property string $parentVirtualFolderId_fk
 * @property integer $isOwner
 */
class VirtualFolder extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return VirtualFolder the static model class
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
		return 'virtualfolder';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userId_fk, folderId_fk, parentVirtualFolderId_fk, isOwner', 'required'),
			array('isOwner', 'numerical', 'integerOnly'=>true),
			array('userId_fk, folderId_fk, parentVirtualFolderId_fk', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('virtualFolderId_pk, userId_fk, folderId_fk, parentVirtualFolderId_fk, isOwner', 'safe', 'on'=>'search'),
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
                    'folder' => array(self::BELONGS_TO, 'Folder', 'folderId_fk'),
                    'parent' => array(self::BELONGS_TO, 'VirtualFolder', 'parentVirtualFolderId_fk'),
                    'childs' => array(self::HAS_MANY, 'VirtualFolder', 'parentVirtualFolderId_fk'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'virtualFolderId_pk' => 'Virtual Folder Id Pk',
			'userId_fk' => 'User Id Fk',
			'folderId_fk' => 'Folder Id Fk',
			'parentVirtualFolderId_fk' => 'Parent Virtual Folder Id Fk',
			'isOwner' => 'Is Owner',
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

		$criteria->compare('virtualFolderId_pk',$this->virtualFolderId_pk,true);
		$criteria->compare('userId_fk',$this->userId_fk,true);
		$criteria->compare('folderId_fk',$this->folderId_fk,true);
		$criteria->compare('parentVirtualFolderId_fk',$this->parentVirtualFolderId_fk,true);
		$criteria->compare('isOwner',$this->isOwner);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        /**
         * Returns an array of the ancestor name of a virtualFolder. The 0th
         * element contains the grand-child where as the last element contains
         * the grand-parent. It always return at least one element in array.
         * 
         * @todo currently it returns id, change it later to name
         *
         * @return array names of the ancestors
         */
        public function generateBreadcrumbs() {
            $breadcrumbs = array();
            $virtualFolder = $this;
            // Current folder should not be a link
            $breadcrumbs[] = $virtualFolder->virtualFolderId_pk;
            while($virtualFolder->hasParent()) {
                $virtualFolder = $virtualFolder->parent;
                $breadcrumbs[$virtualFolder->virtualFolderId_pk] = array('virtualFolder/view', 'id'=>$virtualFolder->virtualFolderId_pk);
            }
            return $breadcrumbs;
        }
        
        /**
         * Checks whether virtualFolder has a parent
         * 
         * @return boolean 
         */
        public function hasParent() {
            if($this->parent === null) {
                return false;
            }
            return true;
        }
}