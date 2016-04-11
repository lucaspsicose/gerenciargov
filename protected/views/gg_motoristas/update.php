<?php
$this->breadcrumbs=array(
	'Gg Motoristases'=>array('index'),
	$model->motoristas_id=>array('view','id'=>$model->motoristas_id),
	'Update',
);

$this->menu=array(
        array('label'=>'Cadastrar Novo Motorista', 'url'=>array('create')),
	array('label'=>'Lista de Motoristas', 'url'=>array('admin')),
);
$this->setPageTitle('Editar Cadastro');
?>

<h1>Editar <?php echo $model->motorista_nome; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
