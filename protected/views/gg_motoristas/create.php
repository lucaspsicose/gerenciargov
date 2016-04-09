<?php
$this->breadcrumbs=array(
	'Cadastro de Motoristas'=>array('index'),
	'Cadastro',
);

$this->menu=array(
	array('label'=>'Cadastrar Novo Motorista', 'url'=>array('create')),
	array('label'=>'Lista de Motoristas', 'url'=>array('admin')),
);

$this->setPageTitle('Cadastro de Motorista');
?>

<div class="bs-docs-section mar-b-30">

    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>