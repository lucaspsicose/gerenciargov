<?php
$this->breadcrumbs=array(
	'Gg Statuses'=>array('index'),
	$model->status_id=>array('view','id'=>$model->status_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gg_status', 'url'=>array('index')),
	array('label'=>'Create Gg_status', 'url'=>array('create')),
	array('label'=>'View Gg_status', 'url'=>array('view', 'id'=>$model->status_id)),
	array('label'=>'Manage Gg_status', 'url'=>array('admin')),
);
?>

<h1>Update Gg_status <?php echo $model->status_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>