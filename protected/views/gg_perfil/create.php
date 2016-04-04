<?php
$this->breadcrumbs=array(
	'Gg Perfils'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Gg_perfil', 'url'=>array('index')),
	array('label'=>'Manage Gg_perfil', 'url'=>array('admin')),
);
?>

<h1>Create Gg_perfil</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>