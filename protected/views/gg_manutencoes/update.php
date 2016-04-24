<?php
$this->breadcrumbs=array(
	'Gg Manutencoes'=>array('index'),
	$model->manutencoes_id=>array('view','id'=>$model->manutencoes_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Cadastrar Nova Manutenção', 'url'=>array('create')),
	array('label'=>'Lista de Manutenções', 'url'=>array('admin')),
        array('label'=>'Checklist', 'url'=>array('gg_check_list/admin')),
);
?>

<h1>Editar Manutenção #<?php echo $model->manutencoes_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>