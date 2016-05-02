<?php
$this->breadcrumbs=array(
	'Cadastro de Checklist'=>array('index'),
	'Cadastro',
);

$this->menu=array(
	array('label'=>'Cadastrar Novo Checklist', 'url'=>array('create')),
	array('label'=>'Lista de Checklists', 'url'=>array('admin')),
);
$this->setPageTitle('Cadastro de Checklist de Viagem');
?>

<div class="bs-docs-section mar-b-30">
    <h1>Checklist de Viagem</h1>

    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>