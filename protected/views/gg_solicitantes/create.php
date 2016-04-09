<?php
$this->breadcrumbs=array(
	'Gg Solicitantes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista de Solicitantes', 'url'=>array('admin')),
);
?>

<h1>Cadastro de Solicitantes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>