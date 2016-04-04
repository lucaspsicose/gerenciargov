<?php
$this->breadcrumbs=array(
	'Gg Perfils',
);

$this->menu=array(
	array('label'=>'Create Gg_perfil', 'url'=>array('create')),
	array('label'=>'Manage Gg_perfil', 'url'=>array('admin')),
);
?>

<h1>Gg Perfils</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
