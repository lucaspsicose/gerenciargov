<?php
$this->breadcrumbs=array(
	'Gg Obrases',
);

$this->menu=array(
	array('label'=>'Create Gg_obras', 'url'=>array('create')),
	array('label'=>'Manage Gg_obras', 'url'=>array('admin')),
);
?>

<h1>Gg Obrases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
