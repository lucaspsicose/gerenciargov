<?php
$this->breadcrumbs=array(
	'Gg Perfils'=>array('index'),
	$model->perfis_id,
);

$this->menu=array(
	array('label'=>'List Gg_perfil', 'url'=>array('index')),
	array('label'=>'Create Gg_perfil', 'url'=>array('create')),
	array('label'=>'Update Gg_perfil', 'url'=>array('update', 'id'=>$model->perfis_id)),
	array('label'=>'Delete Gg_perfil', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->perfis_id),'confirm'=>Yii::t('zii','Are you sure you want to delete this item?'))),
	array('label'=>'Manage Gg_perfil', 'url'=>array('admin')),
);
?>

<h1>View Gg_perfil #<?php echo $model->perfis_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'perfis_id',
		'perfil_nome',
		'perfil_capabilidade',
	),
)); ?>
