<?php
$this->breadcrumbs=array(
	'Gg Secretariases'=>array('index'),
	$model->secretarias_id=>array('view','id'=>$model->secretarias_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Cadastrar Nova Secretaria', 'url'=>array('create')),
	array('label'=>'Lista de Secretarias', 'url'=>array('admin')),
);
$this->setPageTitle('Editar Cadastro');
?>

<h1>Editar <?php echo $model->secretaria_nome; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>