<?php
$this->breadcrumbs=array(
	'Cadastro de Etapa'=>array('index'),
	'Cadastro',
);

$this->menu=array(
        array('label'=>'Cadastrar Nova Etapa', 'url'=>array('create')),
	array('label'=>'Lista de Etapas', 'url'=>array('admin')),
);
$this->setPageTitle('Cadastro de Etapa');
?>

<div class="bs-docs-section mar-b-30">
    <h1>Obra</h1>

    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>