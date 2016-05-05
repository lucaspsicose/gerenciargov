<?php
$this->breadcrumbs=array(
	'Cadastro de Viagens'=>array('index'),
	'Cadastro',
);

$this->menu=array(
	array('label'=>'Cadastrar Nova Viagem', 'url'=>array('create')),
	array('label'=>'Lista de Viagens', 'url'=>array('admin')),
        array('label'=>'Checklist de Viagem', 'url'=>array('gg_checklist_viagem/admin')),
);

$this->setPageTitle('Cadastro de Viagens');

if (!isset($_GET['veiculo'])) {
        Gg_veiculo_viagensController::redirect($this->createUrl('select_veiculo'));
    } 
?>

<div class="bs-docs-section mar-b-30">
    <h1>Viagens</h1>

    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>