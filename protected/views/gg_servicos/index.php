<?php
$this->breadcrumbs=array(
	'Gg Servicoses',
);

$this->menu=array(
	array('label'=>'Create Gg_servicos', 'url'=>array('create')),
	array('label'=>'Manage Gg_servicos', 'url'=>array('admin')),
);
?>

<h1>Gg Servicoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
