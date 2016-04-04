<?php
$this->breadcrumbs=array(
	'Gg Secretariases',
);

$this->menu=array(
	array('label'=>'Create Gg_secretarias', 'url'=>array('create')),
	array('label'=>'Manage Gg_secretarias', 'url'=>array('admin')),
);
?>

<h1>Gg Secretariases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
