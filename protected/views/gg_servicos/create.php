<?php
$this->breadcrumbs=array(
	'Gg Servicoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Gg_servicos', 'url'=>array('index')),
	array('label'=>'Manage Gg_servicos', 'url'=>array('admin')),
);
?>

<h1>Create Gg_servicos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>