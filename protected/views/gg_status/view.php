<?php
$this->breadcrumbs=array(
	'Gg Statuses'=>array('index'),
	$model->status_id,
);

$this->menu=array(
	array('label'=>'List Gg_status', 'url'=>array('index')),
	array('label'=>'Create Gg_status', 'url'=>array('create')),
	array('label'=>'Update Gg_status', 'url'=>array('update', 'id'=>$model->status_id)),
	array('label'=>'Delete Gg_status', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->status_id),'confirm'=>Yii::t('zii','Are you sure you want to delete this item?'))),
	array('label'=>'Manage Gg_status', 'url'=>array('admin')),
);
?>

<h1>View Gg_status #<?php echo $model->status_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'status_id',
		'status_nome',
	),
)); ?>
