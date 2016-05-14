<?php

class Gg_abastecimentosController extends Controller
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
		$model=new Gg_abastecimentos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gg_abastecimentos']))
		{
			$model->attributes=$_POST['Gg_abastecimentos'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->abastecimentos_id));
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

		if(isset($_POST['Gg_abastecimentos']))
		{
			$model->attributes=$_POST['Gg_abastecimentos'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->abastecimentos_id));
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
		$dataProvider=new CActiveDataProvider('Gg_abastecimentos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Gg_abastecimentos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gg_abastecimentos']))
			$model->attributes=$_GET['Gg_abastecimentos'];

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
				$this->_model=Gg_abastecimentos::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'Página não existe.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='gg-abastecimentos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionImprimir() {
            if (isset($_GET['id'])) {
                $model = Gg_abastecimentos::model()->findByPk($_GET['id']);
                $txt = $this->renderPartial('view', array('model' => $model), true);
                $abastecimentos_id = $_GET['id'];
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->geraHMTLAbastecimento($abastecimentos_id);
                $html2pdf->WriteHTML($txt);                
                $html2pdf->Output();
            }
        }
        
        public function  geraHMTLAbastecimento($abastecimentos_id = '') 
        {   
            $db = new DbExt();
            
            $html = Yii::app()->functions->getCabecalhoRelatorios(); 
            
            $sql = 'SELECT v.veiculo_placa,
                v.veiculo_descricao,
                a.abastecimento_quilometragem, 
                c.combustivel_nome, 
                a.abastecimento_litro, 
                a.abastecimento_preco, 
                a.abastecimento_data 
                FROM Gg_abastecimentos a 
                join Gg_veiculos v on (v.veiculos_id = a.veiculos_id)
                join Gg_tipo_combustivel c on (a.combustivel_id = c.combustivel_id)
                WHERE a.abastecimentos_id = '.$abastecimentos_id;
            
            if ($res = $db->rst($sql)) {
                foreach ($res as $stmt) {
                    $veiculo_placa                = $stmt['veiculo_placa'];
                    $veiculo_descricao            = $stmt['veiculo_descricao'];
                    $abastecimento_quilometragem  = $stmt['abastecimento_quilometragem'];
                    $combustivel_nome             = $stmt['combustivel_nome'];
                    $abastecimento_litro          = $stmt['abastecimento_litro'];
                    $abastecimento_preco          = $stmt['abastecimento_preco'];
                    $abastecimento_data           = $stmt['abastecimento_data'];
                }
            
                $html .= '<div style="float: left; width:100%">
                                <hr />
                                    <h1 align="center">Abastecimento #'.$abastecimentos_id.'</h1>
				<hr />
                         
                            <table width="100%" style="font-size:16px; line-height:30px;">
                                <tbody>
                                  <tr>
                                    <td><strong>Veículo</strong></td>
                                    <td><strong>Quilometragem</strong></td>
                                  </tr>
                                  <tr>
                                    <td>'.substr($veiculo_descricao, 0, 61).' ('.$veiculo_placa.')</td>
                                    <td>'.$abastecimento_quilometragem.'</td>
                                  </tr>      
                                  <tr>
                                    <td><strong>Combustível</strong></td>
                                    <td><strong>Litros</strong></td>
                                  </tr>
                                  <tr>
                                    <td>'.$combustivel_nome.'</td>
                                    <td>'.$abastecimento_litro.'</td>
                                  </tr>
                                  <tr>
                                    <td><strong>Preço</strong></td>
                                    <td><strong>Data</strong></td>
                                  </tr>
                                  <tr>
                                    <td>'.$abastecimento_preco.'</td>
                                    <td>'.date('d/m/Y', strtotime($abastecimento_data)).'</td>    
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
