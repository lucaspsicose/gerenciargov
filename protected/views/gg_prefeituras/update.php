<?php
$this->breadcrumbs=array(
	'Gg Prefeiturases'=>array('index'),
	$model->prefeituras_id=>array('view','id'=>$model->prefeituras_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gg_prefeituras', 'url'=>array('index')),
	array('label'=>'Create Gg_prefeituras', 'url'=>array('create')),
	array('label'=>'View Gg_prefeituras', 'url'=>array('view', 'id'=>$model->prefeituras_id)),
	array('label'=>'Manage Gg_prefeituras', 'url'=>array('admin')),
);
?>

<h1>Update Gg_prefeituras <?php echo $model->prefeituras_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>