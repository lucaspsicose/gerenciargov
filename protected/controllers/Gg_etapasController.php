<?php

class Gg_etapasController extends Controller
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
		$model=new Gg_etapas;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gg_etapas']))
		{
			$model->attributes=$_POST['Gg_etapas'];
			if($model->save())
                        {
                            $db = new DbExt();
                            $sql = 'SELECT 
                                    o.obra_qte_etapa
                                    FROM Gg_obras o 
                                    WHERE o.obras_id = '.$model->obras_id;
                            
                            if ($res = $db->rst($sql)) {
                                foreach ($res as $stmt)
                                    
                                $obra_qte_etapa = $stmt['obra_qte_etapa'];
                                $obra_qte_etapa = $obra_qte_etapa + 1;
                                $obra_porc_etapa = 100/$obra_qte_etapa;
                                
                                $sql2 = 'update Gg_obras set obra_qte_etapa = '.$obra_qte_etapa.','
                                    . ' obra_porc_etapa = '.$obra_porc_etapa
                                    . ' where obras_id = '.$model->obras_id;
                                    
                                $db->qry($sql2); 
                            }
                            
                            if($model->etapa_status == 'Em Andamento')
                            {
                                $db = new DbExt();
                                $params['etapa_concluido']  = '50';
                                $db->updateData('Gg_etapas', $params, 'etapas_id', $model->etapas_id);
                            }
                            else if($model->etapa_status == 'Concluída')
                            {
                                $db = new DbExt();
                                $params['etapa_concluido']  = '100';
                                $db->updateData('Gg_etapas', $params, 'etapas_id', $model->etapas_id);
                                
                            }
                            
                            $sql = 'select count(etapas_id) as andamento '
                                    . 'from Gg_etapas '
                                    . 'where etapa_concluido = 50 '
                                    . 'and obras_id = '.$model->obras_id;
                            
                            if ($res = $db->rst($sql)) {
                                foreach ($res as $stmt)
                                
                                $etapa_andamento = $stmt['andamento'];
                               
                                $obra_concluido = $etapa_andamento * ($obra_porc_etapa / 2);
                               
                            }
                            
                            $sql = 'select count(etapas_id) as concluido '
                                    . 'from Gg_etapas '
                                    . 'where etapa_concluido = 100 '
                                    . 'and obras_id = '.$model->obras_id;
                            
                            if ($res = $db->rst($sql)) {
                                foreach ($res as $stmt)
                                
                                $etapa_concluido = $stmt['concluido'];
                               
                                $obra_concluido = $obra_concluido + ($etapa_concluido * $obra_porc_etapa);
                                
                                if($obra_concluido < 100)
                                {
                                    $params2['obra_concluido'] = $obra_concluido;
                               
                                    $db->updateData('Gg_obras', $params2, 'obras_id', $model->obras_id);
                                }
                                else{
                                    $obra_concluido = '100';
                                    
                                    $sql = 'update Gg_obras set obra_concluido = '.$obra_concluido.','
                                    . 'status_obra = \'Concluída\' '
                                    . 'where obras_id = '.$model->obras_id;
                                    
                                    $db->qry($sql); 
                                }
                                
                               
                            }
                            
                            $this->redirect(array('view','id'=>$model->etapas_id));
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

		if(isset($_POST['Gg_etapas']))
		{
			$model->attributes=$_POST['Gg_etapas'];
			if($model->save())
                        {
                            $db = new DbExt();
                            $sql = 'SELECT 
                                    o.obra_qte_etapa
                                    FROM Gg_obras o 
                                    WHERE o.obras_id = '.$model->obras_id;
                            
                            if ($res = $db->rst($sql)) {
                                foreach ($res as $stmt)
                                    
                                $obra_qte_etapa = $stmt['obra_qte_etapa'];
                                $obra_porc_etapa = 100/$obra_qte_etapa;
                                
                            }                                    
                            
                            if($model->etapa_status == 'Em Andamento')
                            {
                                $db = new DbExt();
                                $params['etapa_concluido']  = '50';
                                $db->updateData('Gg_etapas', $params, 'etapas_id', $model->etapas_id);
                            }
                            else if($model->etapa_status == 'Concluída')
                            {
                                $db = new DbExt();
                                $params['etapa_concluido']  = '100';
                                $db->updateData('Gg_etapas', $params, 'etapas_id', $model->etapas_id);
                                
                            }
                            
                            $sql = 'select count(etapas_id) as andamento '
                                    . 'from Gg_etapas '
                                    . 'where etapa_concluido = 50 '
                                    . 'and obras_id = '.$model->obras_id;
                            
                            if ($res = $db->rst($sql)) {
                                foreach ($res as $stmt)
                                
                                $etapa_andamento = $stmt['andamento'];
                               
                                $obra_concluido = $etapa_andamento * ($obra_porc_etapa / 2);
                            }
                            
                            $sql = 'select count(etapas_id) as concluido '
                                    . 'from Gg_etapas '
                                    . 'where etapa_concluido = 100 '
                                    . 'and obras_id = '.$model->obras_id;
                            
                            if ($res = $db->rst($sql)) {
                                foreach ($res as $stmt)
                                
                                $etapa_concluido = $stmt['concluido'];
                               
                                $obra_concluido = $obra_concluido + ($etapa_concluido * $obra_porc_etapa);
                                
                                if($obra_concluido < 100)
                                {
                                    $params2['obra_concluido'] = $obra_concluido;
                               
                                    $db->updateData('Gg_obras', $params2, 'obras_id', $model->obras_id);
                                }
                                else{
                                    $obra_concluido = '100';
                                    
                                    $sql = 'update Gg_obras set obra_concluido = '.$obra_concluido.','
                                    . 'status_obra = \'Concluída\''
                                    . 'where obras_id = '.$model->obras_id;
                                    
                                    $db->qry($sql);
                                }
                                
                               
                            }
                            
                            $this->redirect(array('view','id'=>$model->etapas_id));
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
                $model=$this->loadModel();
		if(!Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                        if(!isset($_GET['ajax'])){
                            $db = new DbExt();
                            $sql = 'SELECT 
                                    o.obra_qte_etapa
                                    FROM Gg_obras o 
                                    WHERE o.obras_id = '.$model->obras_id;
                            
                            if ($res = $db->rst($sql)) {
                                foreach ($res as $stmt)
                                    
                                $obra_qte_etapa = $stmt['obra_qte_etapa'];
                                $obra_qte_etapa = $obra_qte_etapa - 1;
                                $obra_porc_etapa = 100/$obra_qte_etapa;
                                
                                $sql2 = 'update Gg_obras set obra_qte_etapa = '.$obra_qte_etapa.','
                                    . ' obra_porc_etapa = '.$obra_porc_etapa
                                    . ' where obras_id = '.$model->obras_id;
                                    
                                $db->qry($sql2); 
                            }
                                                                                    
                            $sql = 'select count(etapas_id) as andamento '
                                    . 'from Gg_etapas '
                                    . 'where etapa_concluido = 50 '
                                    . 'and obras_id = '.$model->obras_id;
                            
                            if ($res = $db->rst($sql)) {
                                foreach ($res as $stmt)
                                
                                $etapa_andamento = $stmt['andamento'];
                               
                                $obra_concluido = $etapa_andamento * ($obra_porc_etapa / 2);
                               
                            }
                            
                            $sql = 'select count(etapas_id) as concluido '
                                    . 'from Gg_etapas '
                                    . 'where etapa_concluido = 100 '
                                    . 'and obras_id = '.$model->obras_id;
                            
                            if ($res = $db->rst($sql)) {
                                foreach ($res as $stmt)
                                
                                $etapa_concluido = $stmt['concluido'];
                               
                                $obra_concluido = $obra_concluido + ($etapa_concluido * $obra_porc_etapa);
                                
                                if($obra_concluido < 100)
                                {
                                    $params['obra_concluido'] = $obra_concluido;
                               
                                    $db->updateData('Gg_obras', $params, 'obras_id', $model->obras_id);
                                }
                                else{
                                    $obra_concluido = '100';
                                    
                                    $sql = 'update Gg_obras set obra_concluido = '.$obra_concluido.','
                                    . 'status_obra = \'Concluída\' '
                                    . 'where obras_id = '.$model->obras_id;
                                    
                                    $db->qry($sql); 
                                }
                                
                               
                            }
                            $this->redirect(array('admin'));
                        }
				
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Gg_etapas');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Gg_etapas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gg_etapas']))
			$model->attributes=$_GET['Gg_etapas'];

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
				$this->_model=Gg_etapas::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='gg-etapas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionImprimir() {
            if (isset($_GET['id'])) {
                $model = Gg_etapas::model()->findByPk($_GET['id']);
                $txt = $this->renderPartial('view', array('model' => $model), true);
                $etapas_id = $_GET['id'];
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->geraHMTLEtapa($etapas_id);
                $html2pdf->WriteHTML($txt);                
                $html2pdf->Output();
            }
        }
        
        public function  geraHMTLEtapa($etapas_id = '') 
        {   
            $db = new DbExt();
            
            $html = Yii::app()->functions->getCabecalhoRelatorios(); 
            
            $sql = 'SELECT r.responsavel_nome,
                o.obra_nome,
                e.etapa_descricao, 
                e.etapa_data_inicial,
                e.etapa_data_final,
                e.etapa_saldo,
                e.etapa_status,
                e.etapa_concluido
                FROM Gg_etapas e 
                join Gg_responsaveis r on (r.responsaveis_id = e.responsaveis_id)
                join Gg_obras o on (o.obras_id = e.obras_id)
                WHERE e.etapas_id = '.$etapas_id;
            
            if ($res = $db->rst($sql)) {
                foreach ($res as $stmt) {
                    $responsavel_nome     = $stmt['responsavel_nome'];
                    $obra_nome            = $stmt['obra_nome'];
                    $etapa_descricao      = $stmt['etapa_descricao'];
                    $etapa_data_inicial   = $stmt['etapa_data_inicial'];
                    $etapa_data_final     = $stmt['etapa_data_final'];
                    $etapa_saldo          = $stmt['etapa_saldo'];
                    $etapa_status         = $stmt['etapa_status'];
                    $etapa_concluido      = $stmt['etapa_concluido'];
                }
            
                $html .= '<div style="float: left; width:100%">
                                <hr />
                                    <h1 align="center">Etapa #'.$etapas_id.'</h1>
				<hr />
                         
                            <table width="100%" style="font-size:16px; line-height:30px;">
                                <tbody>
                                  <tr>
                                    <td><strong>Obra</strong></td>
                                    <td><strong>Responsável</strong></td>
                                  </tr>
                                  <tr>
                                    <td>'.substr($obra_nome, 0, 61).'</td>
                                    <td>'.substr($responsavel_nome, 0, 61).'</td>    
                                  </tr>      
                                  <tr>
                                    <td colspan="2"><strong>Descrição</strong></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">'.$etapa_descricao.'</td>
                                  </tr>
                                  <tr>
                                    <td><strong>Data de Início</strong></td>
                                    <td><strong>Data de Término</strong></td>
                                  </tr>
                                  <tr>
                                    <td>'.date('d/m/Y', strtotime($etapa_data_inicial)).'</td>
                                    <td>'.date('d/m/Y', strtotime($etapa_data_final)).'</td>    
                                  </tr>
                                  <tr>
                                    <td><strong>Saldo (R$)</strong></td>
                                    <td><strong>Status</strong></td>
                                  </tr>
                                  <tr>
                                    <td>'.$etapa_saldo.'</td>
                                    <td>'.$etapa_status.'</td>    
                                  </tr>
                                </tbody>  
                            </table>
                        </div>
                        </div>
                        </body>
                        </html>';
            } 
            
            return $html;
        }
}


