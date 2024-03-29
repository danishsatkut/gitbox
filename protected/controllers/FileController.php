<?php

class FileController extends Controller
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
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new File;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['File']))
		{
			$model->attributes=$_POST['File'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->fileId_pk));
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

		if(isset($_POST['File']))
		{
			$model->attributes=$_POST['File'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->fileId_pk));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
    
    /**
     *
     * @param type $id the id of file
     */
    public function actionTrash($id) {
        $fileToBeTrashed = $this->loadModel($id);
        
        $fileToBeTrashed->t_folderId = $fileToBeTrashed->folderId_fk;
        
        $fileToBeTrashed->folderId_fk = null;
        
        if($fileToBeTrashed->save()) {
            $this->redirect(array('site/index'));
        }
    }

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
     * 
     * @todo NOTE: This is not an efficient way of deleting, we should probably 
     * use POST request.
	 */
	public function actionDelete($id)
	{
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('site/index'));
	}
    
    /**
     * @todo find where the file is
     * 
     * @param type $id file id
     */
    public function actionDownload($id) {
        $file = $this->loadModel($id);
        if($file->parent !== null) {
            $folderPath = $file->parent->generatePath();
        } else {
            $folderPath =  Yii::app()->storage->folder->realpath . "/" . Yii::app()->user->name;
        }
        
        $file = CFile::set($folderPath . '/' . $file->fileName);
        $file->download();
        
        //$this->render('_download', array('file'=>$file));
    }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('File');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
    
    /**
     * steps:
     * 
     * 1. Upload the file
     * 2. Find the path of the folder from id where id is virtualFolderId
     * 
     * @param type $id 
     */
    public function actionUpload($id = 0) {
        $this->layout = '//layouts/column1';
        
        // $dir = Yii::app()->storage->folder->realpath;
        $uploaded = false;
        $model = new FileUpload();
       
        
        if(isset($_POST['FileUpload']))
        {
            $model->file = $_POST['FileUpload']['file'];
            $file = CUploadedFile::getInstance($model,'file');
            
            if($id != 0) {
                $virtualFolder = VirtualFolder::model()->findByPk($id);
                $dir = $virtualFolder->folder->generatePath();
            } else {
                $dir = Yii::app()->storage->folder->realpath . "/" . Yii::app()->user->name;
            }
            if($model->validate()){
                // Save the data in the database
                
                $fileModel = new File();
                $fileModel->fileName = $file->name;
                $fileModel->size = $file->size;
                $fileModel->mime = $file->type;
                $fileModel->extension = $file->extensionName;
                $fileModel->createdBy_fk = Yii::app()->user->id;
                if($id != 0) {
                    $fileModel->folderId_fk = $virtualFolder->folder->folderId_pk;
                }
                
                if($fileModel->save()) {
                    $uploaded = $file->saveAs($dir.'/'.$file->getName());
                    $this->redirect(array('virtualFolder/view','id'=>$id));
                }
            }
        }
        
        $this->render('upload', array(
            'model' => $model,
            'uploaded' => $uploaded,
            'dir' => $dir,
            'file' => $file,
            'id'=>$id,
      ));
    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new File('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['File']))
			$model->attributes=$_GET['File'];

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
		$model=File::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='file-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
