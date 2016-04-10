<?php
$this->breadcrumbs=array(
	'Gg Atendimentoses'=>array('index'),
	$model->atendimentos_id=>array('view','id'=>$model->atendimentos_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Atendimentos', 'url'=>array('admin')),
	array('label'=>'Novo Atendimento', 'url'=>array('create')),
	array('label'=>'Ver Atendimento', 'url'=>array('view', 'id'=>$model->atendimentos_id)),
);
?>

<h1>Editar Atendimento <?php echo $model->atendimento_protocolo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>