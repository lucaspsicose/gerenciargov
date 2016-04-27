<?php
$this->breadcrumbs=array(
	'Cadastro de Abastecimento'=>array('index'),
	'Cadastro',
);

$this->menu=array(
	array('label'=>'Cadastrar Novo Abastecimento', 'url'=>array('create')),
        array('label'=>'Lista de Abastecimentos', 'url'=>array('admin')),
);
$this->setPageTitle('Cadastro de Abastecimento');
?>

<div class="bs-docs-section mar-b-30">
    <h1>Abastecimento</h1>

    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>