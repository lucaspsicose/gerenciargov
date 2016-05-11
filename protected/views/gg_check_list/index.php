<?php
$this->breadcrumbs=array(
	'Gg Check Lists',
);

$this->menu=array(
	array('label'=>'Manage Gg_check_list', 'url'=>array('admin')),
);
?>

<h1>Gg Check Lists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
