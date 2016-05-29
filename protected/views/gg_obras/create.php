<?php
$this->breadcrumbs=array(
	'Cadastro de Obra'=>array('index'),
	'Cadastro',
);

$this->menu=array(
        array('label'=>'Cadastrar Nova Obra', 'url'=>array('create')),
	array('label'=>'Lista de Obras', 'url'=>array('admin')),
);
$this->setPageTitle('Cadastro de Obra');
?>

<div class="bs-docs-section mar-b-30">
    <h1>Obra</h1>

    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>