<?php
$this->breadcrumbs=array(
	'Cadastro de Checklist'=>array('index'),
	'Cadastro',
);

$this->menu=array(
	array('label'=>'Lista de Checklists', 'url'=>array('admin')),
);
$this->setPageTitle('Cadastro de Checklist');
?>

<div class="bs-docs-section mar-b-30">
    <h1>Checklist</h1>

    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>