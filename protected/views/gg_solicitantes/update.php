<?php
$this->breadcrumbs=array(
	'Gg Solicitantes'=>array('index'),
	$model->solicitantes_id=>array('view','id'=>$model->solicitantes_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gg_solicitantes', 'url'=>array('index')),
	array('label'=>'Create Gg_solicitantes', 'url'=>array('create')),
	array('label'=>'View Gg_solicitantes', 'url'=>array('view', 'id'=>$model->solicitantes_id)),
	array('label'=>'Manage Gg_solicitantes', 'url'=>array('admin')),
);
?>

<h1>Update Gg_solicitantes <?php echo $model->solicitantes_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>