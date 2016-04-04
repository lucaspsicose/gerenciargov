<?php
$this->breadcrumbs=array(
	'Gg Solicitantes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Gg_solicitantes', 'url'=>array('index')),
	array('label'=>'Manage Gg_solicitantes', 'url'=>array('admin')),
);
?>

<h1>Create Gg_solicitantes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>