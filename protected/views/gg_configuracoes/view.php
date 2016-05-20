<?php
$this->breadcrumbs=array(
	'Gg Configuracoes'=>array('index'),
	$model->configuracoes_id,
);

$this->menu=array(
	array('label'=>'List Gg_configuracoes', 'url'=>array('index')),
	array('label'=>'Create Gg_configuracoes', 'url'=>array('create')),
	array('label'=>'Update Gg_configuracoes', 'url'=>array('update', 'id'=>$model->configuracoes_id)),
	array('label'=>'Delete Gg_configuracoes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->configuracoes_id),'confirm'=>Yii::t('zii','Are you sure you want to delete this item?'))),
	array('label'=>'Manage Gg_configuracoes', 'url'=>array('admin')),
);
?>

<h1>View Gg_configuracoes #<?php echo $model->configuracoes_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'configuracoes_id',
		'configuracao_field',
		'configuracao_valor',
		'usuarios_id',
		'prefeituras_id',
		'secretarias_id',
	),
)); ?>
