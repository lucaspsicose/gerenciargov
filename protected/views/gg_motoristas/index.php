<?php
$this->breadcrumbs=array(
	'Gg Motoristases',
);

$this->menu=array(
	array('label'=>'Create Gg_motoristas', 'url'=>array('create')),
	array('label'=>'Manage Gg_motoristas', 'url'=>array('admin')),
);
?>

<h1>Gg Motoristases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
