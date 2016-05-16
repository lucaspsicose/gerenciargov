<?php
$this->breadcrumbs=array(
	'Gg Manut Agendas'=>array('index'),
	$model->manut_agendas_id=>array('view','id'=>$model->manut_agendas_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Agendar Manutenção', 'url'=>array('create')),
	array('label'=>'Lista de Agendamentos', 'url'=>array('admin')),
);
?>

<h1>Editar Agendamento #<?php echo $model->manut_agendas_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>