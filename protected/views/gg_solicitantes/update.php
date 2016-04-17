<?php
$this->breadcrumbs=array(
	'Gg Solicitantes'=>array('index'),
	$model->solicitantes_id=>array('view','id'=>$model->solicitantes_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista de Solicitantes', 'url'=>array('admin')),
	array('label'=>'Novo Cadastro', 'url'=>array('create')),
	array('label'=>'Ver Cadastro', 'url'=>array('view', 'id'=>$model->solicitantes_id)),
);
?>

<h1>Editar Cadastro  #<?php echo $model->solicitante_nome; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>