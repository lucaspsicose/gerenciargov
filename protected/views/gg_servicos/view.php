<?php
$this->breadcrumbs=array(
	'Gg Servicoses'=>array('index'),
	$model->servicos_id,
);

$this->menu=array(
	array('label'=>'List Gg_servicos', 'url'=>array('index')),
	array('label'=>'Create Gg_servicos', 'url'=>array('create')),
	array('label'=>'Update Gg_servicos', 'url'=>array('update', 'id'=>$model->servicos_id)),
	array('label'=>'Delete Gg_servicos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->servicos_id),'confirm'=>Yii::t('zii','Are you sure you want to delete this item?'))),
	array('label'=>'Manage Gg_servicos', 'url'=>array('admin')),
);
?>

<h1>View Gg_servicos #<?php echo $model->servicos_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'servicos_id',
		'servico_nome',
		'secretarias_id',
	),
)); ?>
