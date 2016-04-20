<?php

class Gg_atendimentosController extends Controller
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
                         array('allow',
                                'actions'=>array('busca'),
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
		$model=new Gg_atendimentos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gg_atendimentos']))
		{
			$model->attributes=$_POST['Gg_atendimentos'];
			if($model->save()) {
				$this->redirect(array('view','id'=>$model->atendimentos_id));
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

		if(isset($_POST['Gg_atendimentos']))
		{
			$model->attributes=$_POST['Gg_atendimentos'];
			if($model->update()) {
				$this->redirect(array('view','id'=>$model->atendimentos_id));
                        }
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
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Gg_atendimentos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Gg_atendimentos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gg_atendimentos'])) {
			$model->attributes=$_GET['Gg_atendimentos'];
                        }
                            
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
				$this->_model=Gg_atendimentos::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='gg-atendimentos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionImprimir() {
            if (isset($_GET['id'])) {
                $model = Gg_atendimentos::model()->findByPk($_GET['id']);
                $txt = $this->renderPartial('view', array('model' => $model), true);
                $atendimentos_id = $_GET['id'];
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->geraHMTLAtendimento($atendimentos_id);
                $html2pdf->WriteHTML($txt);
                $html2pdf->Output();
            }
        } 
        
        public function  geraHMTLAtendimento($atendimentos_id = '') 
        {   
            $db = new DbExt();
            
            $htm = '';
            
            $sql = 'SELECT a.atendimento_protocolo,'
                    . '    a.atendimento_endereco,'
                    . '    a.atendimento_numero,'
                    . '    a.atendimento_bairro,'
                    . '    a.descricao_servico,'
                    . '    a.atendimento_descricao,'
                    . '    a.atendimento_inclusao,'
                    . '    p.prefeitura_nome,'
                    . '    s.solicitante_nome,'
                    . '    u.usuario_nome,'
                    . '    sc.secretaria_nome,'
                    . '    s.solicitante_cpf_cnpj,'
                    . '    coalesce(s.solicitante_celular, s.solicitante_telefone) as telefone'
                    . ' FROM Gg_atendimentos a'
                    . ' JOIN Gg_solicitantes s ON (a.solicitantes_id = s.solicitantes_id)'
                    . ' JOIN Gg_usuarios     u ON (a.usuarios_id     = u.usuarios_id    )'
                    . ' JOIN Gg_secretarias sc ON (a.secretarias_id  = sc.secretarias_id)'
                    . ' JOIN Gg_prefeituras  p ON (s.prefeituras_id  = p.prefeituras_id )'
                    . ' WHERE a.atendimentos_id = '.$atendimentos_id;
            
            if ($res = $db->rst($sql)) {
                foreach ($res as $stmt) {
                    $protocolo = $stmt['atendimento_protocolo'];
                    $municipe  = $stmt['solicitante_nome'];
                    $data      = $stmt['atendimento_inclusao'];
                    $secretaria= $stmt['secretaria_nome'];
                    $servidor  = $stmt['usuario_nome'];
                    $cpf       = $stmt['solicitante_cpf_cnpj'];
                    $tel       = $stmt['telefone'];
                    $endereco  = $stmt['atendimento_endereco'];
                    $numero    = $stmt['atendimento_numero'];
                    $bairo     = $stmt['atendimento_bairro'];
                    $servico   = $stmt['descricao_servico'];
                    $descricao = $stmt['atendimento_descricao'];
                    $prefeitura= $stmt['prefeitura_nome'];
                }
            
                $htm = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                        <html xmlns="http://www.w3.org/1999/xhtml">
                        <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <title>relatório de Atendimento</title>
                        <style>
                                table {
                                        font-size: 16px;
                                        line-height: 30px;
                                }
                        </style>
                        </head>

                        <body>
                        <table align="center" width="980px">
                            <thead align="center">
                                <tr text-align="center">
                                        <td colspan="3"><h1 align="center">'.$prefeitura.'</h1></td>
                                </tr>
                                <tr text-align="center">
                                    <td colspan="3"><h1 align="center">Protocolo #'.$protocolo.'</h1></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                        <td><strong>Servidor</strong></td> 
                                    <td><strong>Data do Atendimento</strong></td>
                                    <td><strong>Secretaria</strong></td>
                                </tr>
                                <tr>
                                        <td>'.$servidor.'</td> 
                                    <td>'.$data.'</td>
                                    <td>'.$secretaria.'</td>
                                </tr>
                                <tr>
                                        <td colspan="3"><strong>Munícipe</strong></td>
                                </tr>
                                <tr>
                                        <td colspan="3">'.$municipe.'</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>CPF/CNPJ</strong></td>
                                    <td colspan="1"><strong>Telefone</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="2">'.$cpf.'</td>
                                    <td colspan="1">'.$tel.'</td>
                                </tr>
                                <tr>
                                        <td colspan="2"><strong>Endereço para Atendimento</strong></td>
                                    <td colspan="1"><strong>Bairro</strong></td>
                                </tr>
                                <tr>
                                        <td colspan="2">'.$endereco.' nº '.$numero.'</td>
                                    <td colspan="1">'.$bairo.'</td>
                                </tr>
                                <tr>
                                        <td colspan="3"><strong>Serviço</strong></td>
                                </tr>
                                <tr>
                                        <td colspan="3">'.$servico.'</td>
                                </tr>
                                <tr>
                                        <td colspan="3"><strong>Descrição da Solicitação</strong></td>
                                </tr>
                                <tr>
                                        <td colspan="3">'.$descricao.'</td>
                                </tr>
                            </tbody>
                        </table>
                        </body>
                        </html>';
            } 
            
            return $htm;
        }
}
