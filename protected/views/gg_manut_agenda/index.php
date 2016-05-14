<?php
$this->breadcrumbs=array(
	'Gg Manut Agendas',
);

$this->menu=array(
	array('label'=>'Create Gg_manut_agenda', 'url'=>array('create')),
	array('label'=>'Manage Gg_manut_agenda', 'url'=>array('admin')),
);
?>

<h1>Gg Manut Agendas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
