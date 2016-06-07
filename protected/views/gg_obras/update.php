<?php
$this->breadcrumbs=array(
	'Gg Obrases'=>array('index'),
	$model->obras_id=>array('view','id'=>$model->obras_id),
	'Update',
);

$this->menu=array(
        array('label'=>'Cadastrar Nova Obra', 'url'=>array('create')),
	array('label'=>'Lista de Obras', 'url'=>array('admin')),
        array('label'=>'Etapas', 'url'=>array('gg_etapas/admin')),
);
$this->setPageTitle('Editar Cadastro');
?>

<h1>Editar <?php echo $model->obra_nome; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>