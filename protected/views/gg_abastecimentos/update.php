<?php
$this->breadcrumbs=array(
	'Gg Abastecimentoses'=>array('index'),
	$model->abastecimentos_id=>array('view','id'=>$model->abastecimentos_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Cadastrar Novo Abastecimento', 'url'=>array('create')),
        array('label'=>'Lista de Abastecimentos', 'url'=>array('admin')),
);
?>

<h1>Editar Abastecimento #<?php echo $model->abastecimentos_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>