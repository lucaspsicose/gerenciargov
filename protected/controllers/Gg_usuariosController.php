<?php

class Gg_usuariosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

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
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','perfil'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Gg_usuarios;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gg_usuarios']))
		{       
                        if (isset($_POST['secretarias'])) {
                            $secretarias = $_POST['secretarias'];
                        } else {
                            $secretarias = '';
                        }
                        
			$model->attributes=$_POST['Gg_usuarios'];
			//if($model->save())
                        if (Yii::app()->functions->addUsuario($_POST['Gg_usuarios']['usuario_nome'],
                                                              $_POST['Gg_usuarios']['usuario_login'],
                                                              $_POST['Gg_usuarios']['usuario_senha'],
                                                              $_POST['Gg_usuarios']['perfis_id'],
                                                              $_POST['Gg_usuarios']['usuario_email'],
                                                              $_POST['Gg_usuarios']['prefeituras_id'],
                                                              $secretarias)) {
                                $txt  = '<p>Confirma&ccedil;&atilde;o do Registro do Usu&aacute;rio '.$model->usuario_nome.'</p>';
                                $txt .= '<p>Login: '.$model->usuario_login.'</p>';
                                $txt .= '<p>Senha: '.$model->usuario_senha.'</p>';
                                $txt .= 'Para acessar a plataforma acesse <a href="'.Yii::app()->request->getBaseUrl(TRUE).'">aqui.</a>';
                                $email = Yii::app()->email;
                                $email->to = $model->usuario_email;
                                $email->from = 'gerenciargov@gerenciargov.com.br';
                                $email->subject = 'Registro de Usu&aacute;rio';
                                $email->message = $txt;
                                $email->send();
                                $this->redirect(array('admin'));
                        }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gg_usuarios']))
		{
                        if (isset($_POST['secretarias'])) {
                            $secretarias = $_POST['secretarias'];
                        } else {
                            $secretarias = '';
                        }
                        
			$model->attributes=$_POST['Gg_usuarios'];
			//if($model->save())
                        if (Yii::app()->functions->updateUsuario($_POST['Gg_usuarios']['usuarios_id'],
                                                                 $_POST['Gg_usuarios']['usuario_nome'],
                                                                 $_POST['Gg_usuarios']['usuario_login'],
                                                                 $_POST['Gg_usuarios']['usuario_senha'],
                                                                 $_POST['Gg_usuarios']['perfis_id'],
                                                                 $_POST['Gg_usuarios']['usuario_email'],
                                                                 $secretarias)) {
				$this->redirect(array('view','id'=>$model->usuarios_id));
                        }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
        
        public function actionPerfil() 
        {
            $model=$this->loadModel();
            
            if(isset($_POST['Gg_usuarios'])) 
            {
                $model->attributes=$_POST['Gg_usuarios'];
                
                if ($this->updatePerfil($model->usuarios_id, 
                                        $model->usuario_nome,
                                        $model->usuario_login, 
                                        $model->usuario_senha, 
                                        $model->usuario_email)) {
                    $this->redirect(Yii::app()->request->baseUrl.'/site/menu');
                }
                
            } else {
                $this->render('perfil',array(
			'model'=>$model,
		));
            }
        }

        /**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(!Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Gg_usuarios');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Gg_usuarios('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gg_usuarios']))
			$model->attributes=$_GET['Gg_usuarios'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Gg_usuarios::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'A página que você está procurando não existe.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='gg-usuarios-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function updatePerfil($usuarios_id = '', $usuario_nome = '', $usuario_login = '', $usuario_senha = '', $usuario_mail = '') 
        {
            $db = new DbExt();
            
            $params['usuario_nome']  = $usuario_nome;
            
            if ($usuario_senha !== '') {
                $params['usuario_senha'] = md5($usuario_senha);
            }
            
            $params['usuario_email'] = $usuario_mail;
            $params['usuario_login'] = $usuario_login;
            
            $db->updateData('Gg_usuarios', $params, 'usuarios_id', $usuarios_id);
            
            unset($params);
            
            return TRUE;
            
        }
}
