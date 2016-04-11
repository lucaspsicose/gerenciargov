<?php
$this->breadcrumbs=array(
	'Gg Prefeiturases'=>array('index'),
	$model->prefeituras_id,
);

$this->menu=array(
	array('label'=>'List Gg_prefeituras', 'url'=>array('index')),
	array('label'=>'Create Gg_prefeituras', 'url'=>array('create')),
	array('label'=>'Update Gg_prefeituras', 'url'=>array('update', 'id'=>$model->prefeituras_id)),
	array('label'=>'Delete Gg_prefeituras', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->prefeituras_id),'confirm'=>Yii::t('zii','Are you sure you want to delete this item?'))),
	array('label'=>'Manage Gg_prefeituras', 'url'=>array('admin')),
);
?>

<h1>View Gg_prefeituras #<?php echo $model->prefeituras_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'prefeituras_id',
		'prefeitura_nome',
		'prefeitura_municipio',
		'estados_id',
		'prefeitura_endereco',
		'prefeitura_numero',
		'prefeitura_telefone',
	),
)); ?>
