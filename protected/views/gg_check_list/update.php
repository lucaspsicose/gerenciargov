<?php
$this->breadcrumbs=array(
	'Gg Check Lists'=>array('index'),
	$model->check_list_id=>array('view','id'=>$model->check_list_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'Cadastrar Novo Checklist', 'url'=>array('create')),
	array('label'=>'Lista de Checklist', 'url'=>array('admin')),
);
$this->setPageTitle('Editar Cadastro');
?>

<h1>Editar #<?php echo $model->check_list_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>