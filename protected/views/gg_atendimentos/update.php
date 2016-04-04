<?php
$this->breadcrumbs=array(
	'Gg Atendimentoses'=>array('index'),
	$model->atendimentos_id=>array('view','id'=>$model->atendimentos_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gg_atendimentos', 'url'=>array('index')),
	array('label'=>'Create Gg_atendimentos', 'url'=>array('create')),
	array('label'=>'View Gg_atendimentos', 'url'=>array('view', 'id'=>$model->atendimentos_id)),
	array('label'=>'Manage Gg_atendimentos', 'url'=>array('admin')),
);
?>

<h1>Update Gg_atendimentos <?php echo $model->atendimentos_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>