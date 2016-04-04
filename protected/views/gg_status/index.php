<?php
$this->breadcrumbs=array(
	'Gg Statuses',
);

$this->menu=array(
	array('label'=>'Create Gg_status', 'url'=>array('create')),
	array('label'=>'Manage Gg_status', 'url'=>array('admin')),
);
?>

<h1>Gg Statuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
