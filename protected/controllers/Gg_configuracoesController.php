<?php

class Gg_configuracoesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

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
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
	public function actionIndex()
	{   
            $model = new Gg_configuracoes;
            
		if(isset($_POST['configuracoes']))
		{
                    $config = $_POST['configuracoes'];
                    $i = 0;
                    while ($i < count($config)) {                        
                        $configuracao_field    = key($config);
                        $configuracao_valor   = $config[$configuracao_field];

                        $prefeituras_id = Yii::app()->session['active_prefeituras_id'];

                        $stmt="SELECT * FROM
                        Gg_configuracoes
                        WHERE
                        configuracao_field='".addslashes($configuracao_field)."'		
                        AND prefeituras_id = ".$prefeituras_id;

                        $connection=Yii::app()->db;
                        $rows=$connection->createCommand($stmt)->queryAll(); 		

                        $params=array(
                        'configuracao_field'=> addslashes($configuracao_field),
                        'configuracao_valor'=> addslashes($configuracao_valor),
                        'prefeituras_id'=>  addslashes($prefeituras_id)    
                        );

                        $matching = 'configuracao_field = :option_name and prefeituras_id = :prefeituras_id';
                        $parametros = array();
                        $parametros[':option_name'] = addslashes($configuracao_field);
                        $parametros[':prefeituras_id'] = $prefeituras_id;                        

                        $command = Yii::app()->db->createCommand();

                        if (is_array($rows) && count($rows)>=1){
                                $res = $command->update('Gg_configuracoes' , $params , 
                                                             $matching,
                                                             $parametros
                                                             );
                            
                        } else {			
                            $command->insert('Gg_configuracoes',$params);
                        }
                        
                        $i++;
                        next($config);
                    }
                    
                    unset($_POST['configuracoes']);
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
}
