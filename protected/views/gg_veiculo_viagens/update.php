<?php
$this->breadcrumbs=array(
	'Gg Veiculo Viagens'=>array('index'),
	$model->viagens_id=>array('view','id'=>$model->viagens_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Cadastrar Nova Viagem', 'url'=>array('create')),
	array('label'=>'Lista de Viagens', 'url'=>array('admin')),
        array('label'=>'Checklist', 'url'=>array('Gg_check_list/admin')),
);
$this->setPageTitle('Editar Cadastro');
?>

<h1>Editar #<?php echo $model->viagens_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>