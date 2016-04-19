<?php
$this->breadcrumbs=array(
	'Gg Prefeiturases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista de Prefeituras', 'url'=>array('admin')),
);
$this->setPageTitle('Prefeituras');
?>

<h1>Nova Prefeitura</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>