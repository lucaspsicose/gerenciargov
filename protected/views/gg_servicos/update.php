<?php
$this->breadcrumbs=array(
	'Gg Servicoses'=>array('index'),
	$model->servicos_id=>array('view','id'=>$model->servicos_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gg_servicos', 'url'=>array('index')),
	array('label'=>'Create Gg_servicos', 'url'=>array('create')),
	array('label'=>'View Gg_servicos', 'url'=>array('view', 'id'=>$model->servicos_id)),
	array('label'=>'Manage Gg_servicos', 'url'=>array('admin')),
);
?>

<h1>Update Gg_servicos <?php echo $model->servicos_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>