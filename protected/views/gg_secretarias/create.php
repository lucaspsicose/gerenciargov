<?php
$this->breadcrumbs=array(
	'Gg Secretariases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista de Secretarias', 'url'=>array('admin')),
        array('label' =>'Cadastrar Nova Secretaria', 'url'=>array('create')),
);

$this->setPageTitle('Cadastro de Secretarias');
?>

<div class="bs-docs-section mar-b-30">

    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>