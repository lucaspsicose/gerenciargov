<?php
$this->breadcrumbs=array(
	'Gg Motoristases'=>array('index'),
	$model->motoristas_id=>array('view','id'=>$model->motoristas_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gg_motoristas', 'url'=>array('index')),
	array('label'=>'Create Gg_motoristas', 'url'=>array('create')),
	array('label'=>'View Gg_motoristas', 'url'=>array('view', 'id'=>$model->motoristas_id)),
	array('label'=>'Manage Gg_motoristas', 'url'=>array('admin')),
);
?>

<h1>Update Gg_motoristas <?php echo $model->motoristas_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>