<?php
$this->breadcrumbs=array(
	'Cadastro de Manutenção'=>array('index'),
	'Cadastro',
);

$this->menu=array(
	array('label'=>'Cadastrar Nova Manutenção', 'url'=>array('create')),
	array('label'=>'Lista de Manutenções', 'url'=>array('admin')),
        array('label'=>'Checklist', 'url'=>array('gg_check_list/admin')),
);

$this->setPageTitle('Cadastro de Manutenções');
?>

<div class="bs-docs-section mar-b-30">
    <h1>Manutenção</h1>

    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>