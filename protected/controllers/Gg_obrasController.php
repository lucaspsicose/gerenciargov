<?php

class Gg_obrasController extends Controller
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
		$model=new Gg_obras;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gg_obras']))
		{
			$model->attributes=$_POST['Gg_obras'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->obras_id));
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

		if(isset($_POST['Gg_obras']))
		{
			$model->attributes=$_POST['Gg_obras'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->obras_id));
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
		$dataProvider=new CActiveDataProvider('Gg_obras');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Gg_obras('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gg_obras']))
			$model->attributes=$_GET['Gg_obras'];

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
				$this->_model=Gg_obras::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='gg-obras-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionImprimir() {
            if (isset($_GET['id'])) {
                $model = Gg_obras::model()->findByPk($_GET['id']);
                $txt = $this->renderPartial('view', array('model' => $model), true);
                $obras_id = $_GET['id'];
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->geraHMTLObra($obras_id);
                $html2pdf->WriteHTML($txt);                
                $html2pdf->Output();
            }
        }
        
        public function  geraHMTLObra($obras_id = '') 
        {   
            $db = new DbExt();
            
            $html = Yii::app()->functions->getCabecalhoRelatorios(); 
            
            $sql = 'SELECT r.responsavel_nome,
                o.obra_nome,
                o.obra_descricao, 
                o.obra_local,
                o.obra_orc_previsto,
                o.obra_prev_inicial,
                o.obra_prev_final,
                o.obra_saldo,
                o.obra_data_inicial,
                o.obra_data_final,
                o.obra_concluido
                FROM Gg_obras o 
                join Gg_responsaveis r on (r.responsaveis_id = o.responsaveis_id)
                WHERE o.obras_id = '.$obras_id;
            
            if ($res = $db->rst($sql)) {
                foreach ($res as $stmt) {
                    $responsavel_nome     = $stmt['responsavel_nome'];
                    $obra_nome            = $stmt['obra_nome'];
                    $obra_descricao       = $stmt['obra_descricao'];
                    $obra_local           = $stmt['obra_local'];
                    $obra_orc_previsto    = $stmt['obra_orc_previsto'];
                    $obra_prev_inicial    = $stmt['obra_prev_inicial'];
                    $obra_prev_final      = $stmt['obra_prev_final'];
                    $obra_saldo           = $stmt['obra_saldo'];
                    $obra_data_inicial    = $stmt['obra_data_inicial'];
                    $obra_data_final      = $stmt['obra_data_final'];
                    $obra_concluido       = $stmt['obra_concluido'];
                }
            
                $html .= '<div style="float: left; width:100%">
                                <hr />
                                    <h1 align="center">Obra '.$obra_nome.'</h1>
				<hr />
                         
                            <table width="100%" style="font-size:16px; line-height:30px;">
                                <tbody>
                                  <tr>
                                    <td><strong>Responsável</strong></td>
                                    <td><strong>Local</strong></td>
                                  </tr>
                                  <tr>
                                    <td>'.substr($responsavel_nome, 0, 61).'</td>
                                    <td>'.substr($obra_local, 0, 61).'</td>
                                  </tr>      
                                  <tr>
                                    <td colspan="2"><strong>Descrição</strong></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">'.$obra_descricao.'</td>
                                  </tr>
                                  <tr>
                                    <td><strong>Orçamento Previsto (R$)</strong></td>
                                    <td><strong>Saldo (R$)</strong></td>
                                  </tr>
                                  <tr>
                                    <td>'.$obra_orc_previsto.'</td>
                                    <td>'.$obra_saldo.'</td>    
                                  </tr> 
                                  <tr>
                                    <td><strong>Previsão de Início</strong></td>
                                    <td><strong>Previsão de Término</strong></td>
                                  </tr>
                                  <tr>
                                    <td>'.date('d/m/Y', strtotime($obra_prev_inicial)).'</td>
                                    <td>'.date('d/m/Y', strtotime($obra_prev_final)).'</td>    
                                  </tr>
                                  <tr>
                                    <td><strong>Data de Início</strong></td>
                                    <td><strong>Data de Término</strong></td>
                                  </tr>
                                  <tr>
                                    <td>'.date('d/m/Y', strtotime($obra_data_inicial)).'</td>
                                    <td>'.date('d/m/Y', strtotime($obra_data_final)).'</td>    
                                  </tr>
                                  <tr>
                                    <td colspan="2"><strong>Concluído</strong></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">'.$obra_concluido.'</td>
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
