<?php
$this->breadcrumbs=array(
	'Gg Usuarioses',
);

$this->menu=array(
	array('label'=>'Create Gg_usuarios', 'url'=>array('create')),
	array('label'=>'Manage Gg_usuarios', 'url'=>array('admin')),
);
?>

<h1>Gg Usuarioses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
