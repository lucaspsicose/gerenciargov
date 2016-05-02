<?php
$this->breadcrumbs=array(
	'Gg Checklist Viagems'=>array('index'),
	$model->checklist_viagens_id=>array('view','id'=>$model->checklist_viagens_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Cadastrar Novo Checklist', 'url'=>array('create')),
	array('label'=>'Lista de Checklist', 'url'=>array('admin')),
);
$this->setPageTitle('Editar Cadastro');
?>

<h1>Editar #<?php echo $model->checklist_viagens_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>