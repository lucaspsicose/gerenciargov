<?php
$this->breadcrumbs=array(
	'Gg Etapases',
);

$this->menu=array(
	array('label'=>'Create Gg_etapas', 'url'=>array('create')),
	array('label'=>'Manage Gg_etapas', 'url'=>array('admin')),
);
?>

<h1>Gg Etapases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
