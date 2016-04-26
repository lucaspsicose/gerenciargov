<?php

class Gg_manutencoesController extends Controller
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
		$model=new Gg_manutencoes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gg_manutencoes']))
		{
			$model->attributes=$_POST['Gg_manutencoes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->manutencoes_id));
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

		if(isset($_POST['Gg_manutencoes']))
		{
			$model->attributes=$_POST['Gg_manutencoes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->manutencoes_id));
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
		$dataProvider=new CActiveDataProvider('Gg_manutencoes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Gg_manutencoes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gg_manutencoes']))
			$model->attributes=$_GET['Gg_manutencoes'];

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
				$this->_model=Gg_manutencoes::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='gg-manutencoes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionImprimir() {
            if (isset($_GET['id'])) {
                $model = Gg_manutencoes::model()->findByPk($_GET['id']);
                $txt = $this->renderPartial('view', array('model' => $model), true);
                $manutencoes_id = $_GET['id'];
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->geraHMTLManutencao($manutencoes_id);
                $html2pdf->WriteHTML($txt);                
                $html2pdf->Output();
            }
        }
        
        public function  geraHMTLManutencao($manutencoes_id = '') 
        {   
            $db = new DbExt();
            
            $htm = '';
            
            $sql = 'SELECT v.veiculo_placa,
                    m.manutencao_quilometragem, 
                    m.manutencao_descricao, 
                    m.manutencao_preco, 
                    m.manutencao_data, 
                    p.prefeitura_nome, 
                    p.prefeitura_endereco, 
                    p.prefeitura_numero, 
                    p.prefeitura_telefone,
                    p.prefeitura_municipio,
                    e.estado_nome
                    FROM Gg_manutencoes m
                    join Gg_veiculos    v on (v.veiculos_id = m.veiculos_id)
                    join Gg_prefeituras p on (p.prefeituras_id = m.prefeituras_id )
                    JOIN Gg_estados     e on (e.estados_id     = p.estados_id     )
                    WHERE m.manutencoes_id = '.$manutencoes_id;
            
            if ($res = $db->rst($sql)) {
                foreach ($res as $stmt) {
                    $veiculo_placa             = $stmt['veiculo_placa'];
                    $manutencao_quilometragem  = $stmt['manutencao_quilometragem'];
                    $manutencao_descricao      = $stmt['manutencao_descricao'];
                    $manutencao_preco          = $stmt['manutencao_preco'];
                    $manutencao_data           = $stmt['manutencao_data'];
                    $prefeitura_nome           = $stmt['prefeitura_nome'];
                    $prefeitura_endereco       = $stmt['prefeitura_endereco'];
                    $prefeitura_numero         = $stmt['prefeitura_numero'];
                    $prefeitura_telefone       = $stmt['prefeitura_telefone'];
                    $prefeitura_municipio      = $stmt['prefeitura_municipio'];
                    $estado_nome               = $stmt['estado_nome'];
                }
            
                $htm = '<html>
                        <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <title>relatório de Manutenção</title>
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
                                    <h1 align="center">Manutenção #'.$manutencoes_id.'</h1>
				<hr />
                         
                            <table width="100%" style="font-size:16px; line-height:30px;">
                                <tbody>
                                  <tr>
                                    <td><strong>Veículo</strong></td>
                                    <td><strong>Quilometragem</strong></td>
                                  </tr>
                                  <tr>
                                    <td>'.$veiculo_placa.'</td>
                                    <td>'.$manutencao_quilometragem.'</td>
                                  </tr>      
                                  <tr>
                                    <td colspan="2"><strong>Descrição</strong></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">'.$manutencao_descricao.'</td>
                                  </tr>
                                  <tr>
                                    <td><strong>Preço</strong></td>
                                    <td><strong>Data</strong></td>
                                  </tr>
                                  <tr>
                                    <td>'.$manutencao_preco.'</td>
                                    <td>'.$manutencao_data.'</td>
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
