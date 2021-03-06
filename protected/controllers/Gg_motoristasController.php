<?php

class Gg_motoristasController extends Controller
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
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
                        array('allow',
                                'actions'=>array('imprimir'),
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
		$model=new Gg_motoristas;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gg_motoristas']))
		{
			$model->attributes=$_POST['Gg_motoristas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->motoristas_id));
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

		if(isset($_POST['Gg_motoristas']))
		{
			$model->attributes=$_POST['Gg_motoristas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->motoristas_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
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
		$dataProvider=new CActiveDataProvider('Gg_motoristas');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Gg_motoristas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gg_motoristas']))
			$model->attributes=$_GET['Gg_motoristas'];

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
				$this->_model=Gg_motoristas::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='gg-motoristas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionImprimir() {
            if (isset($_GET['id'])) {
                $model = Gg_motoristas::model()->findByPk($_GET['id']);
                $txt = $this->renderPartial('view', array('model' => $model), true);
                $motoristas_id = $_GET['id'];
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->geraHMTLMotorista($motoristas_id);
                $html2pdf->WriteHTML($txt);                
                $html2pdf->Output();
            }
        }
        
        public function  geraHMTLMotorista($motoristas_id = '') 
        {   
            $db = new DbExt();
            
            $htm = '';
            
            $sql = 'SELECT m.motorista_nome, 
                    m.motorista_cpf, 
                    m.motorista_categoria, 
                    m.motorista_telefone, 
                    p.prefeitura_nome, 
                    p.prefeitura_endereco, 
                    p.prefeitura_numero, 
                    p.prefeitura_telefone,
                    p.prefeitura_municipio,
                    e.estado_nome
                    FROM Gg_motoristas m
                    join Gg_prefeituras p on (p.prefeituras_id = m.prefeituras_id )
                    JOIN Gg_estados     e on (e.estados_id     = p.estados_id     )
                    WHERE m.motoristas_id = '.$motoristas_id;
            
            if ($res = $db->rst($sql)) {
                foreach ($res as $stmt) {
                    $motorista_nome = $stmt['motorista_nome'];
                    $motorista_cpf  = $stmt['motorista_cpf'];
                    $motorista_categoria = $stmt['motorista_categoria'];
                    $motorista_telefone= $stmt['motorista_telefone'];
                    $prefeitura_nome = $stmt['prefeitura_nome'];
                    $prefeitura_endereco= $stmt['prefeitura_endereco'];
                    $prefeitura_numero=$stmt['prefeitura_numero'];
                    $prefeitura_telefone  =$stmt['prefeitura_telefone'];
                    $prefeitura_municipio     =$stmt['prefeitura_municipio'];
                    $estado_nome       =$stmt['estado_nome'];
                }
            
                $htm = '<html>
                        <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <title>relatório de Motorista</title>
                        <style>
                                table {
                                        font-size: 16px;
                                        line-height: 30px;
                                }
                        </style>
                        </head>

                        <body>
                        <div style="width: 100%;">
                            <div style="float: left">
                                <img src="'.Yii::app()->request->getBaseUrl(true).'/assets/img/D-large1.png" alt="" width="258" height="95" />
                        </div>    
                            <div style="float: none; padding-top: 5px; text-align:center; line-height: 1px">
                                <h2 align="center">'.$prefeitura_nome.'</h2>
                                <p>'.$prefeitura_endereco.' nº '.$prefeitura_numero.'</p>
                                <p>Telefone - '.$prefeitura_telefone.'</p>
                                <p>'.$prefeitura_municipio.' - '.$estado_nome.'</p>
                            </div>
                        <div style="float: left; width:100%">
                                <hr />
                                    <h1 align="center">Motorista '.$motorista_nome.'</h1>
				<hr />
                         
                            <table width="100%" style="font-size:16px; line-height:30px;">
                                <tbody>
                                  <tr>
                                    <td><strong>Código</strong></td>
                                  </tr>
                                  <tr>
                                    <td>'.$motoristas_id.'</td>
                                  </tr>      
                                  <tr>
                                    <td><strong>Nome</strong></td>
                                  </tr>
                                  <tr>
                                    <td>'.$motorista_nome.'</td>
                                  </tr>
                                  <tr>
                                    <td><strong>CPF</strong></td>
                                  </tr>
                                  <tr>
                                    <td>'.$motorista_cpf.'</td>
                                  </tr>
                                  <tr>
                                    <td><strong>Categoria da CNH </strong></td>
                                  </tr>
                                  <tr>
                                    <td>'.$motorista_categoria.'</td>
                                  </tr>
                                  <tr>
                                    <td><strong>Telefone</strong></td>
                                  </tr>
                                  <tr>
                                    <td>'.$motorista_telefone.'</td>
                                  </tr>
                                </tbody>  
                            </table>
                        </div>
                        </div>
                        </body>
                        </html>';
            } 
            
            return $htm;
        }
}
