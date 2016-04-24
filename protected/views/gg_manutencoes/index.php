<?php
$this->breadcrumbs=array(
	'Gg Manutencoes',
);

$this->menu=array(
	array('label'=>'Create Gg_manutencoes', 'url'=>array('create')),
	array('label'=>'Manage Gg_manutencoes', 'url'=>array('admin')),
);
?>

<h1>Gg Manutencoes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
