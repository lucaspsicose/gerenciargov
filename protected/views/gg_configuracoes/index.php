<?php
$this->breadcrumbs=array(
	'Gg Configuracoes',
);

$this->menu=array(
	array('label'=>'Create Gg_configuracoes', 'url'=>array('create')),
	array('label'=>'Manage Gg_configuracoes', 'url'=>array('admin')),
);
?>

<h1>Gg Configuracoes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
