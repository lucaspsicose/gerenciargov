<?php
$this->breadcrumbs=array(
	'Gg Perfils'=>array('index'),
	$model->perfis_id=>array('view','id'=>$model->perfis_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gg_perfil', 'url'=>array('index')),
	array('label'=>'Create Gg_perfil', 'url'=>array('create')),
	array('label'=>'View Gg_perfil', 'url'=>array('view', 'id'=>$model->perfis_id)),
	array('label'=>'Manage Gg_perfil', 'url'=>array('admin')),
);
?>

<h1>Update Gg_perfil <?php echo $model->perfis_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>