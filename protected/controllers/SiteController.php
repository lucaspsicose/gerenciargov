<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
    
        public $name = 'Gerenciar Gov';
        
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
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}
        
        public function  actionMenu()
        {   
            if ( isset($_GET['s'])) {
                            Yii::app()->session['active_secretarias_id'] = $_GET['s'];
                            $data = Yii::app()->functions->getDadosSecretarias(Yii::app()->session['active_secretarias_id']);
                            Yii::app()->session['active_secretaria_nome'] = $data['secretaria_nome'];
                }
                
            $this->render('menu');
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
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
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
			$model->data=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->login()) {
				$this->redirect(Yii::app()->user->returnUrl);
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
            Yii::app()->functions->logout();
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        
        public function getQuantidadeAtendimentos($secretarias_id = '')
        {
            $db = new DbExt();
            
            $result = '';
            
            $sql = 'SELECT COUNT(atendimentos_id) as quant FROM Gg_atendimentos WHERE status_id = 1 AND secretarias_id = '.$secretarias_id;
            
            if ($res = $db->rst($sql)) {
                foreach ($res as $count) {
                    $result = $count;
                }
                return $result['quant'];
            }
            
            return 0;
        }
        
        public function getQuantidadeUsuarios($prefeituras_id = '')
        {
            $db = new DbExt();
            
            $result = '';
            
            $sql = 'SELECT COUNT(usuarios_id) as quant FROM Gg_usuarios WHERE prefeituras_id = '.$prefeituras_id;
            
            if ($res = $db->rst($sql)) {
                foreach ($res as $count) {
                    $result = $count;
                }
                return $result['quant'];
            }
            
            return 0;
        }
}