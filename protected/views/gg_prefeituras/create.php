<?php
$this->breadcrumbs=array(
	'Gg Prefeiturases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Gg_prefeituras', 'url'=>array('index')),
	array('label'=>'Manage Gg_prefeituras', 'url'=>array('admin')),
);
?>

<h1>Create Gg_prefeituras</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>