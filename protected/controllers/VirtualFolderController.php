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
			'accessControl', // perform access control for CRUD operations
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
				'actions'=>array('create','update','admin','delete'),
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
                $validId = $id == 0 ? true : VirtualFolder::virtualFolderExists($id);
                // Test if $id is valid
                if($validId) {
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
                                'body'=> 'Your folder - ' . $model->name . ' - was successfully created.',
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
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['VirtualFolder']))
		{
			$model->attributes=$_POST['VirtualFolder'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->virtualFolderId_pk));
		}

		$this->render('update',array(
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
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('VirtualFolder');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
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
}
