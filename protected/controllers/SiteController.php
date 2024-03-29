<?php

class SiteController extends Controller
{
    public $layout = '//layouts/column1';

    /**
     * 
     * Declares class-based actions.
     */
    public function actions()
    {
            return array(
                    // captcha action renders the CAPTCHA image displayed on the contact page
                    'captcha'=>array(
                            'class'=>'CCaptchaAction',
                            'backColor'=>0xFFFFFF,
                    ),
                    // page action renders "static" pages stored under 'protected/views/site/pages'
                    // They can be accessed via: index.php?r=site/page&view=FileName
                    'page'=>array(
                            'class'=>'CViewAction',
                    ),
            );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        // Redirect the request to the virtualfolder/view/0
        $this->redirect(Yii::app()->baseUrl . '/home');
        
        

    }

    /**
        * This is the action to handle external exceptions.
        */
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                    echo $error['message'];
            else
                    $this->render('error', $error);
        }
    }

    /**
        * Displays the contact page
        */
    public function actionContact()
    {
            $model=new ContactForm;
            if(isset($_POST['ContactForm']))
            {
                    $model->attributes=$_POST['ContactForm'];
                    if($model->validate())
                    {
                            $headers="From: {$model->email}\r\nReply-To: {$model->email}";
                            mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
                            Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
                            $this->refresh();
                    }
            }
            $this->render('contact',array('model'=>$model));
    }

    /**
        * Displays the login page
        */
    public function actionLogin()
    {
    // If user is already logged in, redirect to homepage
    if(!Yii::app()->user->isGuest)
        $this->redirect(Yii::app()->homeUrl);

    // Else perform login action
            $model=new LoginForm;

            // if it is ajax validation request
            if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
            {
                    echo CActiveForm::validate($model);
                    Yii::app()->end();
            }

            // collect user input data
            if(isset($_POST['LoginForm']))
            {
        // sets the attributes of the LoginForm model
                    $model->attributes=$_POST['LoginForm'];
                    // validate user input and redirect to the previous page if valid
                    if($model->validate() && $model->login()) {
                        $this->redirect(Yii::app()->homeUrl);
                    }
            }
            // display the login form
            $this->render('login',array('model'=>$model));
    }

    /**
        * Logs out the current user and redirect to homepage.
        */
    public function actionLogout()
    {
            Yii::app()->user->logout();
            $this->redirect(Yii::app()->homeUrl);
    }
    
    /**
     * Register the current user and redirect to the login page
     * 
     * @todo change the register view to provide a good view of registration
     * @todo add a feedback to the user after registration in the login page
     * 
     */
    public function actionRegister()
    {
        $model=new User('register');

        // uncomment the following code to enable ajax-based validation
        
        if(isset($_POST['ajax']) && $_POST['ajax']==='user-register-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['User']))
        {
            $model->attributes=$_POST['User'];
            
            if($model->validate())
            {
                // form inputs are valid, do something here
                // set the flash message for the user to show that registration went successfully
                Yii::app()->user->setFlash('registerSuccess', array(
                    'heading'=>'Yiipee! Registration Successful!',
                    'body'=>'Looks like you made it. Now login and go upload something!',
                    ));
                
                // Add the user in the table
                if($model->save())
                    $this->redirect(array('login'));
            } else {
                Yii::app()->user->setFlash('registerFailure',array(
                    'heading'=>'Oops! Something went wrong!',
                    'body'=>'There was some problem with your registration. We would love if you could try again. 
                        Sorry for the inconvenience.'
                    ));
            }
        }
        $this->render('register',array('model'=>$model));
    }
    
    public function actionTrash() {
        // Need file models that have been trahsed
        
        $criteria = new CDbCriteria();
        $criteria->condition = 'folderId_fk = NULL AND createdBy_fk = ' . Yii::app()->user->id;
        
        $file = File::model()->findAll($criteria);
        
        $this->render('trash', array('file'=>$file));
    }
}