<?php
$this->breadcrumbs=array(
	'Gg Responsaveises'=>array('index'),
	$model->responsaveis_id=>array('view','id'=>$model->responsaveis_id),
	'Update',
);

$this->menu=array(
        array('label'=>'Cadastrar Novo Responsável', 'url'=>array('create')),
	array('label'=>'Lista de Responsáveis', 'url'=>array('admin')),
        array('label'=>'Obras', 'url'=>array('gg_obras/admin')),
);
$this->setPageTitle('Editar Cadastro');
?>

<h1>Editar <?php echo $model->responsavel_nome; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

