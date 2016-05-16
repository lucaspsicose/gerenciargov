<?php
$this->breadcrumbs=array(
	'Agendar Manutenção'=>array('index'),
	'Cadastro',
);

$this->menu=array(
	array('label'=>'Agendar Manutenção', 'url'=>array('create')),
	array('label'=>'Lista de Agendamentos', 'url'=>array('admin')),
);

$this->setPageTitle('Agendar Manutenção');
?>

<div class="bs-docs-section mar-b-30">
    <h1>Agendar Manutenção</h1>

    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>