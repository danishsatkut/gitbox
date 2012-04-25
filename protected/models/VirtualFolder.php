<?php

/**
 * This is the model class for table "virtualfolder".
 *
 * The followings are the available columns in table 'virtualfolder':
 * @property string $virtualFolderId_pk
 * @property string $userId_fk
 * @property string $folderId_fk
 * @property string $parentVirtualFolderId_fk   value '0' represents root folder
 * @property integer $isOwner
 * 
 * Newly Added:
 * @property string $name name of the folder in the user's box
 * @property string $description description of the folder
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
			array('name', 'required'),
            /**
             * The following criteria states that name must be unique where
             * userId_fk, parentVirtualFolderId_fk are same and user is owner of
             * the folder in question.
             * 
             * NOTE: I am not sure if isOwner = 1, will do the trick all the time.
             * When shared folders come into play, we might need some different
             * strategy most likely on application level. Some thoughts are to
             * rename the shared folders automatically.
             * 
             * @todo Unit test for this condition.
             */
            array('name', 'unique', 'criteria'=>array(
                'condition'=>'userId_fk=:uId AND parentVirtualFolderId_fk=:pvfId AND isOwner=:isO',
                'params'=>array(':uId'=>$this->userId_fk, ':pvfId'=>$this->parentVirtualFolderId_fk, ':isO'=>1),
            )),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('name', 'safe', 'on'=>'search'),
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
            'name' => 'Folder Name',
            'description' => 'Folder Description',
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

		$criteria->compare('name', $this->name);
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
            $breadcrumbs[] = $virtualFolder->name;
            while($virtualFolder->hasParent()) {
                $virtualFolder = $virtualFolder->parent;
                // creates a map of 'label'=>'url'
                $breadcrumbs[$virtualFolder->name] = array('virtualFolder/view', 'id'=>$virtualFolder->virtualFolderId_pk);
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
        
        public function createVirtualFolder($realFolder) {
            $realFolder->setHashedName();
            $realFolder->createdBy_fk = $realFolder->modifiedBy_fk = Yii::app()->user->id;
            $folder = CFile::set($realFolder->generatePath());
            
            // If the realFolder is saved successfully in database, continue.
            if($realFolder->save()) {
                $this->folderId_fk = $realFolder->folderId_pk;
                $this->userId_fk = Yii::app()->user->id;
                $this->parentVirtualFolderId_fk = 0;
                $this->isOwner = true;

                if($this->save()) {
                    // If virtual folder creation is successful, create the actual directory
                    $folder->createDir();
                    $this->redirect(array('view','id'=>$model->folderId_pk));
                }
            }
        }
        
        /**
         * Checks whether the virtual folder exists in database
         * 
         * @param int $id The virtual folder id to be checked
         * @return boolean true if a record exists, false otherwise. 
         */
        public static function virtualFolderExists($id) {
            return VirtualFolder::model()->exists('virtualFolderId_pk = ' . $id);
        }
}