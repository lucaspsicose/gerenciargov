<?php
$this->breadcrumbs=array(
	'Cadastro de Responsável'=>array('index'),
	'Cadastro',
);

$this->menu=array(
	array('label'=>'Cadastrar Novo Responsável', 'url'=>array('create')),
	array('label'=>'Lista de Responsáveis', 'url'=>array('admin')),
);

$this->setPageTitle('Cadastro de Responsável');
?>

<div class="bs-docs-section mar-b-30">
    <h1>Responsável</h1>

    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>
