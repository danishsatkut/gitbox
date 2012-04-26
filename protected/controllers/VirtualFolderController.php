<?php

class VirtualFolderController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			//'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','rename','admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
            $currentVirtualFolder = null;
            if($id !== 0) {
                $currentVirtualFolder = VirtualFolder::model()->findByPk($id);
            }
            
            $user = User::model()
                ->with('virtualfolders')
                ->findByPk(Yii::app()->user->id, array(
                    'condition'=>'virtualfolders.parentVirtualFolderId_fk = ' . $id,
                ));
            
		$this->render('view',array(
                    'user' => $user,
                    'currentFolder'=>$currentVirtualFolder,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id = 0)
	{
        $model=new VirtualFolder();
        
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        
        if(isset($_POST['VirtualFolder']))
            {
                // Test if $id is valid
                if(VirtualFolder::virtualFolderExists($id)) {
                    // Id is valid
                    $model->name = $_POST['VirtualFolder']['name'];
                    $model->description = $_POST['VirtualFolder']['description'] === '' ? null : 
                            $_POST['VirtualFolder']['description'];

                    // First we need to create the actual folder
                    $realFolder = new Folder();
                    $realFolder->createdBy_fk = $realFolder->modifiedBy_fk = Yii::app()->user->id;
                    $realFolder->folderName = Folder::generateHashedName();
                    // create a fake name
                    $realFolder->fakeName = $model->name;
                    

                    // If the realFolder is saved successfully in database, continue.
                    if($realFolder->save()) {
                        $model->folderId_fk = $realFolder->folderId_pk;
                        $model->userId_fk = Yii::app()->user->id;
                        // parent id is passed to the action, defaults to 0
                        $model->parentVirtualFolderId_fk = $id;
                        $model->isOwner = true;

                        if($model->save()) {
                            // If virtual folder creation is successful, create the actual directory
                            $folder = CFile::set($realFolder->generatePath());
                            $folder->createDir();
                            Yii::app()->user->setFlash('folderCreationSuccess', array(
                                'heading'=>'Yiipee! Your folder was created successfully!',
                                'body'=> 'Your folder - <span class="label label-success">' . $model->name . '</span> - was successfully created.',
                                ));
                            $this->redirect(array('view','id'=>$id));
                        }
                    }
                } else {
                    Yii::app()->user->setFlash('folderCreationFailure', array(
                        'heading'=>'Oops! Something went wrong!',
                        'body'=>'Invalid parent specified. Sorry, can\'t create a folder in invalid parent.',
                    ));
                    $this->redirect(array('create','id'=>0));
                }
            }
		$this->render('create',array(
			'model'=>$model,
            'id'=>$id,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionRename($id)
	{
		$model=$this->loadModel($id);
        $initialName = $model->name;
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['VirtualFolder']))
		{
			$model->name = $_POST['VirtualFolder']['name'];
            $model->description = $_POST['VirtualFolder']['description'];
            
			if($model->save()) {
                Yii::app()->user->setFlash('folderRenameSuccess', array(
                                'heading'=>'Yiipee! Your folder was renamed successfully!',
                                'body'=> 'Your folder - <span class="label label-info">' . $initialName . '</span> - 
                                    was successfully renamed to - <span class="label label-success">' . $model->name . '</span>.',
                                ));
            	$this->redirect(array('view','id'=>$model->parent->virtualFolderId_pk));
            } else {
                Yii::app()->user->setFlash('folderRenameFailure', array(
                        'heading'=>'Oops! Something went wrong!',
                        'body'=>'Invalid parent specified. Sorry, can\'t create a folder in invalid parent.',
                    ));
            }
		}

		$this->render('rename',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
    
    /**
     * Share a particular virtual folder.
     * 
     * Currently allows sharing with only one person.
     * 
     * steps:
     * 1) Create a Form Model, to add email-address of other users.
     * 2) Perform validation on that Form Model to guarantee that the user exists.
     * 3) If the user exists, create a virtual folder in the user's view
     * 
     * @param int $id Virtual Folder id that is to be shared.
     *  
     */
    public function actionShare($id) {
        // Make sure id is never 0
        $this->layout = '//layouts/column1';
        $shareForm = new ShareForm();
        
        $this->performAjaxValidation($shareForm);
        
        if(isset($_POST['ShareForm'])) {
            $shareForm->email = $_POST['ShareForm']['email'];
            
            if($shareForm->validate()) {
                // Username exists now bring its id
                $criteria = new CDbCriteria;
                $criteria->select = 'id, username';
                $criteria->condition = 'email=:email';
                $criteria->params = array(':email'=>$shareForm->email);
                $shareWithUser = User::model()->find($criteria);
                
                // Now we need the virtual folder that is to be shared
                $model = $this->loadModel($id);
                
                // New virtual folder to be stored in the shared user's box
                $sharedFolder = new VirtualFolder();
                $sharedFolder->userId_fk = $shareWithUser->id;
                $sharedFolder->isOwner = 0;
                $sharedFolder->parentVirtualFolderId_fk = 0;    // Shared folder's are visible in root folder by default
                
                // Common properties
                $sharedFolder->folderId_fk = $model->folderId_fk;
                $sharedFolder->name = $model->name;
                $sharedFolder->description = $model->description;
                
                if($sharedFolder->save()) {
                    Yii::app()->user->setFlash('shareSuccess', array(
                                'heading'=>'Yiipee! Your folder was sahred successfully!',
                                'body'=> 'Your folder - <span class="label label-success">' . $model->name . '</span> - 
                                    was successfully shared with <span class="label label-info">' . $shareWithUser->username . '</span>',
                                ));
                    $this->redirect(array('site/index'));
                } else {
                    Yii::app()->user->setFlash('shareFailure', array(
                        'heading'=>'Oops! Something went wrong!',
                        'body'=>'We are sorry but your your folder - <span class="label label-error">' . $model->name . '</span> 
                            could not be shared.',
                    ));
                }
                
                // Use the user->id to create a virtual folder in the user's drive
                
            }
        }
        
        $this->render('share', array(
            'model'=>$shareForm, 
            'user'=>$shareWithUser->id,
            'folder'=>$model,
            'sharedFolder'=>$sharedFolder,
            ));
    }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $this->redirect(Yii::app()->baseUrl . '/home');
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new VirtualFolder('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VirtualFolder']))
			$model->attributes=$_GET['VirtualFolder'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=VirtualFolder::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='virtual-folder-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    /**
     *  
     */
    protected function createVirtualFolder() {
        
    }
    
    public function displayFlash($flashName) {
        if(Yii::app()->user->hasFlash($flashName)) {
            $output = '';
            $flashMessage = Yii::app()->user->getFlash($flashName);
            $output .= '<div class="alert alert-success alert-block fade in">';
            $output .= '<a class="close" data-dismiss="alert" href="#">&times;</a>';
            $output .= '<h4 class="alert-heading">';
            $output .= $flashMessage['heading'] . '</h4>';
            $output .= $flashMessage['body'];
            $output .= '</div>';
            return $output;
        }
    }
}
