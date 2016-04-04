<?php
$this->breadcrumbs=array(
	'Gg Solicitantes',
);

$this->menu=array(
	array('label'=>'Create Gg_solicitantes', 'url'=>array('create')),
	array('label'=>'Manage Gg_solicitantes', 'url'=>array('admin')),
);
?>

<h1>Gg Solicitantes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
