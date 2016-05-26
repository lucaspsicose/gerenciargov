<?php
$this->breadcrumbs=array(
	'Gg Responsaveises',
);

$this->menu=array(
	array('label'=>'Create Gg_responsaveis', 'url'=>array('create')),
	array('label'=>'Manage Gg_responsaveis', 'url'=>array('admin')),
);
?>

<h1>Gg Responsaveises</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
