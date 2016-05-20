<?php

class Gg_veiculo_viagensController extends Controller
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
                                'actions'=>array('imprimir', 'select_veiculo'),
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
		$model=new Gg_veiculo_viagens;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gg_veiculo_viagens']))
		{
			$model->attributes=$_POST['Gg_veiculo_viagens'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->viagens_id));
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

		if(isset($_POST['Gg_veiculo_viagens']))
		{
			$model->attributes=$_POST['Gg_veiculo_viagens'];
			if($model->save())
                                if($model->quilometragem_chegada > $model->quilometragem_saida)
                                {
                                    //Atualiza a quilometragem do veículo
                                    $db = new DbExt();
                                    
                                    $sql = 'SELECT 
                                            v.veiculo_quilometragem
                                            FROM Gg_veiculos    v 
                                            WHERE v.veiculos_id = '.$model->veiculos_id;
                                    if ($res = $db->rst($sql)) {
                                        foreach ($res as $stmt)
                                    
                                        $veiculo_quilometragem = $stmt['veiculo_quilometragem']; 

                                        if($model->quilometragem_chegada > $veiculo_quilometragem){
                                            $params['veiculo_quilometragem']  = $model->quilometragem_chegada;
                                            $db->updateData('Gg_veiculos', $params, 'veiculos_id', $model->veiculos_id);
                                        }
                                    }                                    
                                    
                                    //Calcula a quilometragem rodada
                                    $params2['quilometragem_rodada'] = $model->quilometragem_chegada - $model->quilometragem_saida; 
                                    $db->updateData('Gg_veiculo_viagens', $params2, 'viagens_id', $model->viagens_id);                                
                                    
                                    $sql2 = 'update Gg_manut_agenda set alertando = \'SIM\' '
                                    . 'where manut_agenda_quilometragem <= '.$model->quilometragem_chegada
                                    . ' and veiculos_id = '.$model->veiculos_id
                                    . ' and alertando <> \'VISTO\''        
                                    . ' and alertando <> \'SIM\'' ;
                                    
                                    $db->qry($sql2);
                                    
                                    $sql3 = 'select configuracao_valor '
                                            . 'from Gg_configuracoes '
                                            . 'where configuracao_field = \'Responsável pela Diária\' '
                                            . 'and prefeituras_id = '.$model->prefeituras_id;
                                    
                                    if ($res2 = $db->rst($sql3)) {
                                        foreach ($res2 as $stmt2)    
                                        //Envia email
                                        $email_responsavel = $stmt2['configuracao_valor'];
                                        $txt = $this->geraHMTLViagem($model->viagens_id);
                                        $email = Yii::app()->email;
                                        $email->to = $email_responsavel;
                                        $email->from = 'gerenciargov@gerenciargov.com.br';
                                        $email->subject = 'Viagem';
                                        $email->message = $txt;
                                        $email->send();
                                    }
                                }        
				$this->redirect(array('view','id'=>$model->viagens_id));
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
		$dataProvider=new CActiveDataProvider('Gg_veiculo_viagens');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Gg_veiculo_viagens('search');
		$model->unsetAttributes();  // clear any default values
                $this->layout = '//layouts/column1';
		if(isset($_GET['Gg_veiculo_viagens']))
			$model->attributes=$_GET['Gg_veiculo_viagens'];

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
				$this->_model=Gg_veiculo_viagens::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='gg-veiculo-viagens-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionImprimir() {
            if (isset($_GET['id'])) {
                $model = Gg_veiculo_viagens::model()->findByPk($_GET['id']);
                $txt = $this->renderPartial('view', array('model' => $model), true);
                $viagens_id = $_GET['id'];
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->geraHMTLViagem($viagens_id);
                $html2pdf->WriteHTML($txt);                
                $html2pdf->Output();
            }
        }
        
        public function  geraHMTLViagem($viagens_id = '') 
        {   
            $db = new DbExt();
            
            $htm = '';
            
            $sql = 'SELECT 
                    vv.data_saida, 
                    vv.quilometragem_saida, 
                    vv.hora_saida, 
                    vv.destino, 
                    vv.finalidade, 
                    vv.data_chegada, 
                    vv.quilometragem_chegada,
                    vv.quilometragem_rodada,
                    vv.hora_chegada, 
                    vv.avaria, 
                    m.motorista_nome, 
                    v.veiculo_placa,
                    v.veiculo_descricao,
                    p.prefeitura_nome, 
                    p.prefeitura_endereco, 
                    p.prefeitura_numero, 
                    p.prefeitura_telefone,
                    p.prefeitura_municipio,
                    e.estado_nome
                    FROM Gg_veiculo_viagens vv 
                    join Gg_motoristas  m on (m.motoristas_id  = vv.motoristas_id )
                    join Gg_veiculos    v on (v.veiculos_id    = vv.veiculos_id   )
                    join Gg_prefeituras p on (p.prefeituras_id = vv.prefeituras_id)
                    JOIN Gg_estados     e on (e.estados_id     = p.estados_id     )
                    WHERE vv.viagens_id = '.$viagens_id;
            
            if ($res = $db->rst($sql)) {
                foreach ($res as $stmt) 
                    $data_saida = $stmt['data_saida'];
                    $quilometragem_saida  = $stmt['quilometragem_saida'];
                    $hora_saida      = $stmt['hora_saida'];
                    $destino= $stmt['destino'];
                    $finalidade  = $stmt['finalidade'];
                    $data_chegada       = $stmt['data_chegada'];
                    $quilometragem_chegada       = $stmt['quilometragem_chegada'];
                    $quilometragem_rodada       = $stmt['quilometragem_rodada'];
                    $hora_chegada  = $stmt['hora_chegada'];
                    if($stmt['avaria'] == 1){
                        $avaria    = 'SIM';
                    }else{
                        $avaria    = 'NÃO';
                    }
                    
                    $motorista_nome     = $stmt['motorista_nome'];
                    $veiculo_placa   = $stmt['veiculo_placa'];
                    $veiculo_descricao   = $stmt['veiculo_descricao'];
                    $prefeitura = $stmt['prefeitura_nome'];
                    $pref_endereco= $stmt['prefeitura_endereco'];
                    $pref_numero=$stmt['prefeitura_numero'];
                    $pref_tel  =$stmt['prefeitura_telefone'];
                    $cidade     =$stmt['prefeitura_municipio'];
                    $estado       =$stmt['estado_nome'];
                
            
                $htm = '<html>
                        <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <title>Relatório de Viagem</title>
                        <style>
                                .alinhamento {
                                        width: 95%;
                                        padding-left: 20px;
                                        padding-top: 20px;
                                        line-height: 100%;
                                }
                        </style>
                        </head>

                        <body>
                        <div class="alinhamento">
                        <div>
                            <div style="float: left">
                                <img src="'.Yii::app()->request->getBaseUrl(true).'/assets/img/D-large1.png" alt="" width="258" height="95" />
                        </div>    
                            <div style="float: none; padding-top: 5px; text-align:center; line-height: 1px">
                                <h2 align="center">'.$prefeitura.'</h2>
                                <p>'.$pref_endereco.' nº '.$pref_numero.'</p>
                                <p>Telefone - '.$pref_tel.'</p>
                                <p>'.$cidade.' - '.$estado.'</p>
                            </div>
                                <hr />
                                <h2 align="center">Relatório de Viagem</h2>                            
                                <p><strong>Veículo:</strong> '.substr($veiculo_descricao, 0, 31).' ('.$veiculo_placa.')
                                   <strong>Motorista:</strong> '.$motorista_nome.
                                '</p>
                                <p><strong>Data Saída:</strong> '.date('d/m/Y', strtotime($data_saida)).'
                                   <strong>KM Saída:</strong> '.$quilometragem_saida.'
                                   <strong>Hora Saída:</strong> '.$hora_saida.
                                '</p>
                                <p><strong>Destino:</strong> '.$destino.'</p>
                                <p><strong>Finalidade:</strong> '.$finalidade.'</p> 
                                <p><strong>Data Chegada:</strong> '.date('d/m/Y', strtotime($data_chegada)).'
                                   <strong>KM Chegada:</strong> '.$quilometragem_chegada.'
                                   <strong>Hora Chegada:</strong> '.$hora_chegada.
                                '</p>    
                                <p><strong>KM Rodada:</strong> '.$quilometragem_rodada.'</p>
                                <p><strong>Avarias?:</strong> '.$avaria.'</p>
                            </div>';
                
                if($stmt['avaria'] == 1){
                    $sql = 'select c.*, v.veiculo_placa from Gg_checklist_viagem c '
                            . 'join Gg_veiculo_viagens vv on (c.viagens_id = vv.viagens_id) '
                            . 'join Gg_veiculos v on (vv.veiculos_id = v.veiculos_id) '
                            . 'where c.viagens_id = '.$viagens_id;
                    
                    if ($res = $db->rst($sql)) {
                        foreach ($res as $stmt)
                        
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
                        $data_alteracao = date('d/m/Y H:i:s', strtotime($data_alteracao));
                        $veiculo_placa   = $stmt['veiculo_placa'];
                        
                        $htm .= '<div class="alinhamento">
                        <h2 align="center">Checklist</h2>                            
                                    <p><strong>Buzina:</strong> '.$buzina.'
                                        <strong>Cinto de Segurança:</strong> '.$cinto.'
                                        <strong>Retrovisor Esq.:</strong> '.$retrovisor_e.'
                                    </p>
                                    <p><strong>Retrovisor Dir.:</strong> '.$retrovisor_d.'
                                        <strong>Farois:</strong> '.$farois.'
                                        <strong>Fluido de Freio:</strong> '.$fluido_freio.'
                                    </p>
                                    <p><strong>Freio:</strong> '.$freio.'
                                        <strong>Freio Mao:</strong> '.$freio_mao.'
                                        <strong>Lataria:</strong> '.$lataria.'
                                    </p>
                                    <p><strong>Luz de Freio:</strong> '.$luz_freio.'
                                        <strong>Luz de Ré:</strong> '.$luz_re.'
                                        <strong>Luzes no Painel:</strong> '.$luz_painel.'
                                    </p>
                                    <p><strong>Nível da Água:</strong> '.$nivel_agua.'
                                        <strong>Nível do Óleo:</strong> '.$nivel_oleo.'
                                        <strong>Pneus:</strong> '.$pneu.'
                                    </p>
                                    <p><strong>Portas:</strong> '.$porta.'
                                        <strong>Seta Dianteira Esq.:</strong> '.$seta_dianteira_e.'
                                        <strong>Seta Dianteira Dir.:</strong> '.$seta_dianteira_d.'
                                    </p> 
                                    <p><strong>Seta Traseira Esq.:</strong> '.$seta_traseira_d.'
                                        <strong>Seta Traseira Dir.:</strong> '.$seta_traseira_e.'
                                        <strong>Seta Vidros:</strong> '.$vidros.'
                                    </p> 
                                    <p><strong>Observação:</strong> '.$observacao.'</p>
                                    <p><strong>Data:</strong> '.$data_alteracao.'</p>
                                </div>';
                    }        
                    
                }
                                  
                $htm .='<div class="alinhamento">
                            <br />
                            <br />
                            <br />
                            <hr width="20px" align="center" />
                            <p align="center">Motorista Responsável</p>
                        </div>
                        </div>
                        </body>
                        </html>';
            } 
            
            return $htm;
        }
    
    public function actionSelect_Veiculo() {
        $this->render('select-veiculos');       
    }
}
