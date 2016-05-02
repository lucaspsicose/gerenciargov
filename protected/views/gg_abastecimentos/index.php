<?php
$this->breadcrumbs=array(
	'Gg Abastecimentoses',
);

$this->menu=array(
	array('label'=>'Create Gg_abastecimentos', 'url'=>array('create')),
	array('label'=>'Manage Gg_abastecimentos', 'url'=>array('admin')),
);
?>

<h1>Gg Abastecimentoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
