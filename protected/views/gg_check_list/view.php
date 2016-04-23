<?php
$this->breadcrumbs=array(
	'Gg Check Lists'=>array('index'),
	$model->check_list_id,
);

$this->menu=array(
	//array('label'=>'Cadastrar Novo Checklist', 'url'=>array('create')),
	array('label'=>'Editar Cadastro', 'url'=>array('update', 'id'=>$model->check_list_id)),
	//array('label'=>'Deletar Cadastro', 'url'=>array('delete', 'id'=>$model->check_list_id), 'linkOptions'=>array('submit'=>array('item/delete','id'=>$model->check_list_id),'confirm'=>Yii::t('zii','Confirma deletar o cadastro deste Checklist?'))),
	array('label'=>'Lista de checklist', 'url'=>array('admin')),
);
$this->setPageTitle('Checklists');
?>

<h1>Checklist #<?php echo $model->check_list_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'check_list_id',
		'veiculos.veiculo_placa',
		'buzina',
		'cinto',
		'retrovisor',
		'farois',
		'fluido_freio',
		'freio',
		'freio_mao',
		'lataria',
		'luz_freio',
		'luz_re',
		'luz_painel',
		'nivel_agua',
		'nivel_oleo',
		'pneu',
		'porta',
		'seta_dianteria',
		'seta_trazeira',
		'vidros',
		'observacao',
		'data_alteracao',
	),
        'htmlOptions' => array('class' => 'table table-responsive'),
)); ?>
