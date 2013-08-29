<?php

class DefaultController extends Controller
{
    public $layout='//layouts/column2';
        /**
	 * @return array action filters
	 */
	public function filters()
	{
		return array('accessControl');
	}
    
        /**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
                        array('allow',
                                'actions'=>array('login','error'),
                                'users'=>array('*')
                        ),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','logout'),
				'users'=>array('@'),
                                'expression'=>'AdmAccess::model()->accessAdmin()==true'
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    
	public function actionIndex()
	{
		$this->render('index');
	}
        
        /**
         * Форма логина
         */
        public function actionLogin(){
            if(AdmAccess::model()->accessAdmin())
                $this->redirect(array('/admin'));
            
            $this->layout = '//layouts/login';
            
            $model=new AdmLoginForm;

            // if it is ajax validation request
            if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
            {
                    echo CActiveForm::validate($model);
                    Yii::app()->end();
            }

            // collect user input data
            if(isset($_POST['AdmLoginForm']))
            {
                    $model->attributes=$_POST['AdmLoginForm'];
                    // validate user input and redirect to the previous page if valid
                    if($model->validate() && $model->login())
                            $this->redirect(array('/admin'));
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
		$this->redirect(array('/admin/login'));
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
			else{
                            $this->layout = '//layouts/login';
				$this->render('error', $error);
                        }
		}
	}
}