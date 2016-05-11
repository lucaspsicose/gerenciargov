<?php

class Gg_checklist_viagemController extends Controller
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
		$model=new Gg_checklist_viagem;

		// Uncomment the following line if AJAX validation is needed
                $this->performAjaxValidation($model);

		if(isset($_POST['Gg_checklist_viagem']))
		{
			$model->attributes=$_POST['Gg_checklist_viagem'];
                        if($model->save()) {
                                $db = new DbExt();
                                $sql = 'select veiculos_id from Gg_veiculo_viagens where viagens_id = '.$model->viagens_id;
                                $res = $db->rst($sql);
                                foreach ($res as $stmt)
                                
                                if($model->buzina == 1){
                                    $params['buzina']  = 1;    
                                } 
                                if($model->cinto == 1){
                                   $params['cinto']  = 1;    
                                }
                                if($model->retrovisor_e == 1){
                                   $params['retrovisor_e']  = 1;    
                                }
                                if($model->retrovisor_d == 1){
                                   $params['retrovisor_d']  = 1;    
                                }
                                if($model->farois == 1){
                                   $params['farois']  = 1;    
                                }
                                if($model->fluido_freio == 1){
                                   $params['fluido_freio']  = 1;    
                                }
                                if($model->freio == 1){
                                   $params['freio']  = 1;    
                                }
                                if($model->freio_mao == 1){
                                   $params['freio_mao']  = 1;    
                                }
                                if($model->lataria == 1){
                                   $params['lataria']  = 1;    
                                }
                                if($model->luz_freio == 1){
                                   $params['luz_freio']  = 1;    
                                }
                                if($model->luz_re == 1){
                                  $params['luz_re']  = 1;    
                                }
                                if($model->luz_painel == 1){
                                   $params['luz_painel']  = 1;    
                                }
                                if($model->nivel_agua == 1){
                                   $params['nivel_agua']  = 1;    
                                }
                                if($model->nivel_oleo == 1){
                                   $params['nivel_oleo']  = 1;    
                                }
                                if($model->pneu == 1){
                                   $params['pneu']  = 1;    
                                }
                                if($model->porta == 1){
                                   $params['porta']  = 1;    
                                }
                                if($model->seta_dianteira_e == 1){
                                   $params['seta_dianteira_e']  = 1;    
                                }
                                if($model->seta_dianteira_d == 1){
                                   $params['seta_dianteira_d']  = 1;    
                                }
                                if($model->seta_traseira_e == 1){
                                   $params['seta_traseira_e']  = 1;    
                                }
                                if($model->seta_traseira_d == 1){
                                   $params['seta_traseira_d']  = 1;    
                                }
                                if($model->vidros == 1){
                                   $params['vidros']  = 1;    
                                }
                                
                                $db->updateData('Gg_check_list', $params, 'veiculos_id', $stmt['veiculos_id']);
                                
				$this->redirect(array('Gg_veiculo_viagens/'.$model->viagens_id));
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

		if(isset($_POST['Gg_checklist_viagem']))
		{
			$model->attributes=$_POST['Gg_checklist_viagem'];
			if($model->save()){
                            $db = new DbExt();
                                $sql = 'select veiculos_id from Gg_veiculo_viagens where viagens_id = '.$model->viagens_id;
                                $res = $db->rst($sql);
                                foreach ($res as $stmt)
                                
                                if($model->buzina == 1){
                                    $params['buzina']  = 1;    
                                } 
                                if($model->cinto == 1){
                                   $params['cinto']  = 1;    
                                }
                                if($model->retrovisor_e == 1){
                                   $params['retrovisor_e']  = 1;    
                                }
                                if($model->retrovisor_d == 1){
                                   $params['retrovisor_d']  = 1;    
                                }
                                if($model->farois == 1){
                                   $params['farois']  = 1;    
                                }
                                if($model->fluido_freio == 1){
                                   $params['fluido_freio']  = 1;    
                                }
                                if($model->freio == 1){
                                   $params['freio']  = 1;    
                                }
                                if($model->freio_mao == 1){
                                   $params['freio_mao']  = 1;    
                                }
                                if($model->lataria == 1){
                                   $params['lataria']  = 1;    
                                }
                                if($model->luz_freio == 1){
                                   $params['luz_freio']  = 1;    
                                }
                                if($model->luz_re == 1){
                                  $params['luz_re']  = 1;    
                                }
                                if($model->luz_painel == 1){
                                   $params['luz_painel']  = 1;    
                                }
                                if($model->nivel_agua == 1){
                                   $params['nivel_agua']  = 1;    
                                }
                                if($model->nivel_oleo == 1){
                                   $params['nivel_oleo']  = 1;    
                                }
                                if($model->pneu == 1){
                                   $params['pneu']  = 1;    
                                }
                                if($model->porta == 1){
                                   $params['porta']  = 1;    
                                }
                                if($model->seta_dianteira_e == 1){
                                   $params['seta_dianteira_e']  = 1;    
                                }
                                if($model->seta_dianteira_d == 1){
                                   $params['seta_dianteira_d']  = 1;    
                                }
                                if($model->seta_traseira_e == 1){
                                   $params['seta_traseira_e']  = 1;    
                                }
                                if($model->seta_traseira_d == 1){
                                   $params['seta_traseira_d']  = 1;    
                                }
                                if($model->vidros == 1){
                                   $params['vidros']  = 1;    
                                }
                                
                                $db->updateData('Gg_check_list', $params, 'veiculos_id', $stmt['veiculos_id']);
                                
                                $this->redirect(array('view','id'=>$model->checklist_viagens_id));
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
		$dataProvider=new CActiveDataProvider('Gg_checklist_viagem');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Gg_checklist_viagem('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gg_checklist_viagem']))
			$model->attributes=$_GET['Gg_checklist_viagem'];

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
				$this->_model=Gg_checklist_viagem::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'A página que você procura não existe!');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='gg-checklist-viagem-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionImprimir() {
            if (isset($_GET['id'])) {
                $model = Gg_checklist_viagem::model()->findByPk($_GET['id']);
                $txt = $this->renderPartial('view', array('model' => $model), true);
                $checklist_viagem_id = $_GET['id'];
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->geraHMTLChecklist_viagem($checklist_viagem_id);
                $html2pdf->WriteHTML($txt);                
                $html2pdf->Output();
            }
        }
        
        public function  geraHMTLChecklist_viagem($checklist_viagem_id = '') 
        {   
            $db = new DbExt();
            
            $htm = '';
            
            $sql = 'SELECT 
                    v.veiculo_placa, 
                    c.buzina, 
                    c.cinto, 
                    c.retrovisor_e,
                    c.retrovisor_d,
                    c.farois, 
                    c.fluido_freio, 
                    c.freio, 
                    c.freio_mao, 
                    c.lataria, 
                    c.luz_freio, 
                    c.luz_re, 
                    c.luz_painel, 
                    c.nivel_agua, 
                    c.nivel_oleo, 
                    c.pneu, 
                    c.porta, 
                    c.seta_dianteira_e,
                    c.seta_dianteira_d,
                    c.seta_traseira_e, 
                    c.seta_traseira_d,
                    c.vidros, 
                    c.observacao, 
                    c.data_alteracao,
                    p.prefeitura_nome, 
                    p.prefeitura_endereco, 
                    p.prefeitura_numero, 
                    p.prefeitura_telefone,
                    p.prefeitura_municipio,
                    e.estado_nome
                    FROM Gg_checklist_viagem c 
                    join Gg_veiculos v on (v.veiculos_id = c.veiculos_id)
                    join Gg_prefeituras p on (p.prefeituras_id = c.prefeituras_id)
                    JOIN Gg_estados     e on (e.estados_id     = p.estados_id     )
                    WHERE c.check_list_id = '.$check_list_id;
            
            if ($res = $db->rst($sql)) {
                foreach ($res as $stmt) 
                    $veiculo_placa = $stmt['veiculo_placa'];
                    
                    if($stmt['buzina'] == 1){
                        $buzina = 'Defeito';
                    }else{
                        $buzina  = 'OK';
                    }
                    
                    if($stmt['cinto'] == 1){
                        $cinto = 'Defeito';
                    }else{
                        $cinto  = 'OK';
                    }
                    
                    if($stmt['retrovisor_e'] == 1){
                        $retrovisor_e = 'Defeito';
                    }else{
                        $retrovisor_e  = 'OK';
                    }
                    
                    if($stmt['retrovisor_d'] == 1){
                        $retrovisor_d = 'Defeito';
                    }else{
                        $retrovisor_d  = 'OK';
                    }
                    
                    if($stmt['farois'] == 1){
                        $farois = 'Defeito';
                    }else{
                        $farois  = 'OK';
                    }
                    
                    if($stmt['fluido_freio'] == 1){
                        $fluido_freio = 'Defeito';
                    }else{
                        $fluido_freio  = 'OK';
                    }
                    
                    if($stmt['freio'] == 1){
                        $freio = 'Defeito';
                    }else{
                        $freio  = 'OK';
                    }
                    
                    if($stmt['freio_mao'] == 1){
                        $freio_mao = 'Defeito';
                    }else{
                        $freio_mao  = 'OK';
                    }
                    
                    if($stmt['lataria'] == 1){
                        $lataria = 'Defeito';
                    }else{
                        $lataria  = 'OK';
                    }
                    
                    if($stmt['luz_freio'] == 1){
                        $luz_freio = 'Defeito';
                    }else{
                        $luz_freio  = 'OK';
                    }
                    
                    if($stmt['luz_re'] == 1){
                        $luz_re = 'Defeito';
                    }else{
                        $luz_re  = 'OK';
                    }
                    
                    if($stmt['luz_painel'] == 1){
                        $luz_painel = 'Defeito';
                    }else{
                        $luz_painel  = 'OK';
                    }
                    
                    if($stmt['nivel_agua'] == 1){
                        $nivel_agua = 'Defeito';
                    }else{
                        $nivel_agua  = 'OK';
                    }
                    
                    if($stmt['nivel_oleo'] == 1){
                        $nivel_oleo = 'Defeito';
                    }else{
                        $nivel_oleo  = 'OK';
                    }
                    
                    if($stmt['pneu'] == 1){
                        $pneu = 'Defeito';
                    }else{
                        $pneu  = 'OK';
                    }
                    
                    if($stmt['porta'] == 1){
                        $porta = 'Defeito';
                    }else{
                        $porta  = 'OK';
                    }
                    
                    if($stmt['seta_dianteira_e'] == 1){
                        $seta_dianteira_e = 'Defeito';
                    }else{
                        $seta_dianteira_e  = 'OK';
                    }
                    
                    if($stmt['seta_dianteira_d'] == 1){
                        $seta_dianteira_d = 'Defeito';
                    }else{
                        $seta_dianteira_d  = 'OK';
                    }
                    
                    if($stmt['seta_traseira_e'] == 1){
                        $seta_traseira_e = 'Defeito';
                    }else{
                        $seta_traseira_e  = 'OK';
                    }
                    
                    if($stmt['seta_traseira_d'] == 1){
                        $seta_traseira_d = 'Defeito';
                    }else{
                        $seta_traseira_d  = 'OK';
                    }
                    
                    if($stmt['vidros'] == 1){
                        $vidros = 'Defeito';
                    }else{
                        $vidros  = 'OK';
                    }
                    
                    $observacao      = $stmt['observacao'];
                    $data_alteracao  = $stmt['data_alteracao'];
                    $veiculo_placa   = $stmt['veiculo_placa'];
                    $prefeitura_nome = $stmt['prefeitura_nome'];
                    $prefeitura_endereco= $stmt['prefeitura_endereco'];
                    $prefeitura_numero=$stmt['prefeitura_numero'];
                    $prefeitura_telefone  =$stmt['prefeitura_telefone'];
                    $prefeitura_municipio     =$stmt['prefeitura_municipio'];
                    $estado_nome       =$stmt['estado_nome'];
                
            
                $htm = '<html>
                        <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <title>relatório de Checklist</title>
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
                                    <h1 align="center">Checklist #'.$veiculo_placa.'</h1>
				<hr />
                         
                            <table width="100%" style="font-size:16px; line-height:30px;">
                                <tbody>
                                  <tr>
                                    <td colspan="3"><strong>Veículo</strong></td>
                                  </tr>
                                  <tr>
                                    <td>'.$veiculo_placa.'</td>
                                  </tr>
                                  <tr>
                                    <td><strong>Buzina</strong></td>
                                    <td><strong>Cinto de Segurança</strong></td>
                                    <td><strong>Retrovisor Esq.</strong></td>
                                  </tr>
                                  <tr>
                                    <td>'.$buzina.'</td>
                                    <td>'.$cinto.'</td>
                                    <td>'.$retrovisor_e.'</td>
                                  </tr>
                                  <tr>
                                    <td><strong>Retrovisor Dir.</strong></td>
                                    <td><strong>Farois</strong></td>
                                    <td><strong>Fluido de Freio</strong></td>                                    
                                  </tr>
                                  <tr>
                                    <td>'.$retrovisor_d.'</td>
                                    <td>'.$farois.'</td>
                                    <td>'.$fluido_freio.'</td>                                    
                                  </tr>
                                  <tr>
                                    <td><strong>Freio</strong></td>
                                    <td><strong>Freio Mao</strong></td>
                                    <td><strong>Lataria</strong></td>                                    
                                  </tr>
                                  <tr>
                                    <td>'.$freio.'</td>
                                    <td>'.$freio_mao.'</td>
                                    <td>'.$lataria.'</td>                                    
                                  </tr>
                                  <tr>
                                    <td><strong>Luz de Freio</strong></td>
                                    <td><strong>Luz de Ré</strong></td>
                                    <td><strong>Luzes no Painel</strong></td>                                    
                                  </tr>
                                  <tr>
                                    <td>'.$luz_freio.'</td>
                                    <td>'.$luz_re.'</td>
                                    <td>'.$luz_painel.'</td>                                    
                                  </tr>
                                  <tr>
                                    <td><strong>Nível da Água</strong></td>
                                    <td><strong>Nível do Óleo</strong></td>
                                    <td><strong>Pneus</strong></td>                                    
                                  </tr>
                                  <tr>
                                    <td>'.$nivel_agua.'</td>
                                    <td>'.$nivel_oleo.'</td>
                                    <td>'.$pneu.'</td>                                    
                                  </tr>
                                  <tr>
                                    <td><strong>Portas</strong></td>
                                    <td><strong>Seta Dianteira Esq.</strong></td>
                                    <td><strong>Seta Dianteira Dir.</strong></td>                                    
                                  </tr>
                                  <tr>
                                    <td>'.$porta.'</td>
                                    <td>'.$seta_dianteira_e.'</td>
                                    <td>'.$seta_dianteira_d.'</td>                                    
                                  </tr>
                                  <tr>
                                    <td><strong>Seta Traseira Esq.</strong></td>
                                    <td><strong>Seta Traseira Dir.</strong></td>
                                    <td><strong>Vidros</strong></td>
                                  </tr>
                                  <tr>
                                    <td>'.$seta_traseira_e.'</td>
                                    <td>'.$seta_traseira_d.'</td>
                                    <td>'.$vidros.'</td>
                                  </tr>}
                                  <tr>
                                    <td colspan="3"><strong>Observação</strong></td>
                                  </tr>
                                  <tr>
                                    <td colspan="3">'.$observacao.'</td>
                                  </tr>
                                  <tr>
                                    <td colspan="3"><strong>Data</strong></td>
                                  </tr>
                                  <tr>
                                    <td colspan="3">'.$data_alteracao.'</td>
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


