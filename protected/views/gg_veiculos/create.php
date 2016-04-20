<?php
$this->breadcrumbs=array(
	'Cadastro de Veículos'=>array('index'),
	'Cadastro',
);

$this->menu=array(
	array('label'=>'Cadastrar Novo Veículo', 'url'=>array('create')),
	array('label'=>'Lista de Veículos', 'url'=>array('admin')),
);

$this->setPageTitle('Cadastro de Veículos');
?>

<div class="bs-docs-section mar-b-30">
    <h1>Veículos</h1>

    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>