<?php
$this->breadcrumbs=array(
	'Gg Prefeiturases',
);

$this->menu=array(
	array('label'=>'Create Gg_prefeituras', 'url'=>array('create')),
	array('label'=>'Manage Gg_prefeituras', 'url'=>array('admin')),
);
?>

<h1>Gg Prefeiturases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
