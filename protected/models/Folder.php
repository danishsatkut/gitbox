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
 * @property string $folderPath => modified to null
 * 
 * The following attributes are available from relations:
 * @property File[] $files array of files in the folder
 * @property User $owner User who owns the folder
 * @property User $modifiedBy User who last modified the folder
 * @property VirtualFolder[] $virtualfolders array of VirtualFolders of this folder
 * @property int $virtualfoldersCount number of virtualfolders of this folder
 * @property int $filesCount number of files in the folder
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
                    'virtualfoldersCount'=>array(self::STAT, 'VirtualFolder', 'folderId_fk'),
                    'filesCount' => array(self::STAT, 'File', 'folderId_fk'),
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
			'owner' => 'Created By',
			'modifiedBy' => 'Last Modified By',
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
    
    /**
     * Sets the modified datetime property to now 
     */
    protected function beforeSave() {
        $date = new DateTime();
        $this->dateModified =  $date->getTimestamp();
        
        return parent::beforeSave();
    }
    
    /**
     * Generates the folder path using username and folder name
     * 
     * This method generates an actual path to be used by the file system to
     * retrieve the files. This path is not stored in database.
     */
    public function generatePath() {
        return Yii::app()->storage->folder->realpath . "/" . $this->owner->username . 
                "/" . $this->folderName;
    }
    
    /**
     * Checks whether the folder is shared
     * 
     * Finds whether two virtual folder with same folder_id exists
     * 
     * @return bool If shared true, else false 
     */
    public function isShared() {
        $isShared = false;
        if($this->virtualfoldersCount > 1) {
            $isShared = true;
        }
        return $isShared;
    }
    
    /**
     * Returns whether the last action was created or modified
     * @return boolean true if created and false if modified
     */
    private function lastAction() {
        $actionCreated = true;  // Created
        if($this->dateModified > $this->dateCreated) {
            $actionCreated = false;  // Modified
        }
        return $actionCreated;
    }
    
    public function lastActionLabel() {
        if($this->lastAction()) {
            return "Created";
        }
        return "Modified";
    }
    
    public function lastActionDate() {
        // Default is created
        $date = null;
        
        if($this->lastAction()) {
            $date = new DateTime($this->dateCreated);
        } else {
            $date = new DateTime($this->dateModified);
        }
        
        return $date->format('M d, Y');
    }
    
    /**
     * Returns the name of user who performed last action on the folder
     *
     * @return string username
     */
    public function lastActionBy() {
        if($this->lastAction()) {
            return $this->owner->username;
        }
        return $this->modifiedBy->username;
    }
}