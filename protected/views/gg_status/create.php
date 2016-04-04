<?php
$this->breadcrumbs=array(
	'Gg Statuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Gg_status', 'url'=>array('index')),
	array('label'=>'Manage Gg_status', 'url'=>array('admin')),
);
?>

<h1>Create Gg_status</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>