<?php
$this->breadcrumbs=array(
	'Gg Motoristases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Gg_motoristas', 'url'=>array('index')),
	array('label'=>'Manage Gg_motoristas', 'url'=>array('admin')),
);
?>

<h1>Create Gg_motoristas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>