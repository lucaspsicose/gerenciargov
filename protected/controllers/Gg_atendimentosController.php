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
                                $email_municipe = Gg_solicitantes::model()->findByPk($model->solicitantes_id);
                                $email_secretaria = Gg_secretarias::model()->findByPk($model->secretarias_id);
                                $txt = $this->geraHMTLAtendimento($model->atendimentos_id);
                                $email = Yii::app()->email;
                                $email->to = $email_municipe->solicitante_email . ', ' . $email_secretaria->secretaria_email;
                                $email->from = 'gerenciargov@gerenciargov.com.br';
                                $email->subject = 'Atendimento';
                                $email->message = $txt;
                                $email->send();
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
                        if ($model->status_id == 4) {
                            $model->setScenario('conclusao'); 
                        }
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
                    . '    st.status_nome,'
                    . '    p.prefeitura_nome,'
                    . '    p.prefeitura_endereco,'
                    . '    p.prefeitura_numero,'
                    . '    p.prefeitura_telefone,'
                    . '    p.prefeitura_municipio,'
                    . '    e.estado_nome,'
                    . '    s.solicitante_nome,'
                    . '    u.usuario_nome,'
                    . '    sc.secretaria_nome,'
                    . '    s.solicitante_cpf_cnpj,'
                    . '    coalesce(s.solicitante_celular, s.solicitante_telefone) as telefone,'
                    . '    so.secretaria_nome as sec_origem,'
                    . '    a.atendimento_descricao_status,'
                    . '    CASE '
                    . '      WHEN a.data_conclusao_servico <> "0000-00-00" THEN'
                    . '         a.data_conclusao_servico'
                    . '      ELSE'
                    . '        "Não Informada"'
                    . '    END as data_conclusao_servico,'
                    . '    a.responsavel_servico,'
                    . '    p.prefeitura_municipio'
                    . ' FROM Gg_atendimentos a'
                    . ' JOIN Gg_solicitantes s ON (a.solicitantes_id = s.solicitantes_id)'
                    . ' JOIN Gg_usuarios     u ON (a.usuarios_id     = u.usuarios_id    )'
                    . ' JOIN Gg_secretarias sc ON (a.secretarias_id  = sc.secretarias_id)'
                    . ' JOIN Gg_secretarias so ON (a.secretarias_origem_id = so.secretarias_id)'
                    . ' JOIN Gg_prefeituras  p ON (s.prefeituras_id  = p.prefeituras_id )'
                    . ' JOIN Gg_estados      e ON (e.estados_id      = p.estados_id     )'
                    . ' JOIN Gg_status      st ON (a.status_id       = st.status_id     )'
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
                    $pref_endereco=$stmt['prefeitura_endereco'];
                    $pref_numero  =$stmt['prefeitura_numero'];
                    $pref_tel     =$stmt['prefeitura_telefone'];
                    $cidade       =$stmt['prefeitura_municipio'];
                    $estado       =$stmt['estado_nome'];
                    $status       =$stmt['status_nome'];
                    $sec_origem   =$stmt['sec_origem'];
                    $serv_executado =$stmt['atendimento_descricao_status'];
                    $data_conclusao =$stmt['data_conclusao_servico'];
                    $cidade         =$stmt['prefeitura_municipio'];
                    $responsavel    =$stmt['responsavel_servico'];
                }
            
                $htm = '<html>
                        <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <title>relatório de Atendimento</title>
                        <style>
                                .alinhamento {
                                        width: 100%;
                                        padding-left: 20px;
                                        padding-top: 20px;
                                        line-height: 60%;
                                }
                                hr {
                                    padding-bottom: 0;
                                    margin-bottom: 0;
                                }
                        </style>
                        </head>

                        <body>
                        <div>
                            <div style="float: left">
                                <img src="'.Yii::app()->request->getBaseUrl(true).'/assets/img/D-large1.png" alt="" width="200" height="82" />
                        </div>    
                            <div style="float: none; padding-top: 5px; text-align:center; line-height: 1px">
                                <h2 align="center">'.$prefeitura.'</h2>
                                <p>'.$pref_endereco.' nº '.$pref_numero.'</p>
                                <p>Telefone - '.$pref_tel.'</p>
                                <p>'.$cidade.' - '.$estado.'</p>
                            </div>
                        <div class="alinhamento">
                            <hr />
                            <h3>Dados do Atendimento</h3>
                            <p><strong>Protocolo:</strong>'.$protocolo.'</p>
                            <p><strong>Servidor:</strong>'.$servidor.'</p>
                            <p><strong>Data do Atendimento:</strong>'.date('d/m/Y', strtotime($data)).'</p>
                            <p><strong>Secretaria de Origem:</strong>'.$sec_origem.'</p>
                            <h3>Dados do Munícipe Solicitante</h3>
                            <p><strong>Nome:</strong>'.$municipe.'</p>
                            <P><strong>CPF:</strong>'.$cpf.'</P>
                            <p><strong>Telefone:</strong>'.$tel.'</p>
                            <h3>Dados da Demanda</h3>
                            <p><strong>Descrição do Serviço:</strong>'.$descricao.'</p>
                            <p><strong>Endereço para Atendimento:</strong>'.$endereco.' nº '.$numero.'</p>
                            <p><strong>Bairro:</strong>'.$bairo.'  <strong>Cidade:</strong>'.$cidade.'</p>
                            <p><strong>Status:</strong>'.$status.'</p>
                            <p><strong>Secretaria Responsável pelo Atendimento:</strong>'.$secretaria.'</p>
                            <p><strong>Responsável pela Execução:</strong>'.$responsavel.'</p>
                            <p><strong>Descrição do Serviço Executado:</strong>'.$serv_executado.'</p>
                            <p><strong>Data da Conclusão do Serviço:</strong>'.$data_conclusao.'</p>
                            <br />
                            <br />
                            <br />
                            <!--<hr width="20px" align="center" />-->
                            <p align="center">___________________________________________<br /><br />
                                <strong>'.$municipe.'</strong><br /><br />
                                Responsável pela Solicitação</p>
                            <br />
                            <br />
                            <!--<hr width="20px" align="center" />-->
                            <p align="center">___________________________________________<br /><br />
                                <strong>'.$servidor.'</strong><br /><br />
                                Responsável pelo Atendimento</p>
                        </div>
                        </div>  
                        </body>
                        </html>';
            } 
            
            return $htm;
        }
}
