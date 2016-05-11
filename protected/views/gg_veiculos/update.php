<?php
$this->breadcrumbs=array(
	'Gg Veiculoses'=>array('index'),
	$model->veiculos_id=>array('view','id'=>$model->veiculos_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Cadastrar Novo Veículo', 'url'=>array('create')),
	array('label'=>'Lista de Veículos', 'url'=>array('admin')),
        array('label'=>'Checklist de Veículos', 'url'=>array('Gg_check_list/admin')),
        array('label'=>'Manutenções', 'url'=>array('Gg_manutencoes/admin')),
        array('label'=>'Abastecimentos', 'url'=>array('Gg_abastecimentos/admin')),
);
$this->setPageTitle('Editar Cadastro');
?>

<h1>Editar <?php echo $model->veiculo_placa; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>