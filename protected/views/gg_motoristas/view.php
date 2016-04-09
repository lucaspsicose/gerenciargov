<?php
$this->breadcrumbs=array(
	'Gg Motoristases'=>array('index'),
	$model->motoristas_id,
);

$this->menu=array(
	array('label'=>'List Gg_motoristas', 'url'=>array('index')),
	array('label'=>'Create Gg_motoristas', 'url'=>array('create')),
	array('label'=>'Update Gg_motoristas', 'url'=>array('update', 'id'=>$model->motoristas_id)),
	array('label'=>'Delete Gg_motoristas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->motoristas_id),'confirm'=>Yii::t('zii','Are you sure you want to delete this item?'))),
	array('label'=>'Manage Gg_motoristas', 'url'=>array('admin')),
);
?>

<h1>View Gg_motoristas #<?php echo $model->motoristas_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'motoristas_id',
		'motorista_nome',
		'motorista_cpf',
		'motorista_categoria',
		'motorista_telefone',
	),
)); ?>
