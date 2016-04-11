<?php
$this->breadcrumbs=array(
	'Gg Veiculoses',
);

$this->menu=array(
	array('label'=>'Create Gg_veiculos', 'url'=>array('create')),
	array('label'=>'Manage Gg_veiculos', 'url'=>array('admin')),
);
?>

<h1>Gg Veiculoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
