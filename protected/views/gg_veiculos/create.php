<?php
$this->breadcrumbs=array(
	'Cadastro de Veículos'=>array('index'),
	'Cadastro',
);

$this->menu=array(
	array('label'=>'Cadastrar Novo Veículo', 'url'=>array('create')),
	array('label'=>'Lista de Veículos', 'url'=>array('admin')),
        array('label'=>'Checklist de Veículos', 'url'=>array('Gg_check_list/admin')),
        array('label'=>'Manutenções', 'url'=>array('Gg_manutencoes/admin')),
        array('label'=>'Abastecimentos', 'url'=>array('Gg_abastecimentos/admin')),
);

$this->setPageTitle('Cadastro de Veículos');
?>

<div class="bs-docs-section mar-b-30">
    <h1>Veículos</h1>

    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>