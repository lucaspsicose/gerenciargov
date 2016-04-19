<?php
$this->breadcrumbs=array(
	'Gg Prefeiturases'=>array('index'),
	$model->prefeituras_id=>array('view','id'=>$model->prefeituras_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista de Prefeituras', 'url'=>array('admin')),
	array('label'=>'Nova Prefeitura', 'url'=>array('create')),
	array('label'=>'Ver Cadastro', 'url'=>array('view', 'id'=>$model->prefeituras_id)),
);
?>

<h1>Editar Prefeitura #<?php echo $model->prefeitura_nome; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>