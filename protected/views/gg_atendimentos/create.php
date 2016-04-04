<?php
$this->breadcrumbs=array(
	'Gg Atendimentoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista de Atendimentos', 'url'=>array('admin')),
);
?>

<h1>Atendimentos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>