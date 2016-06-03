<?php
$this->breadcrumbs=array(
	'Gg Etapases'=>array('index'),
	$model->etapas_id=>array('view','id'=>$model->etapas_id),
	'Update',
);

$this->menu=array(
        array('label'=>'Cadastrar Nova Etapa', 'url'=>array('create')),
	array('label'=>'Lista de Etapas', 'url'=>array('admin')),
);
$this->setPageTitle('Editar Cadastro');
?>

<h1>Editar <?php echo $model->etapas_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>