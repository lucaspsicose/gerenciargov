<?php
$this->breadcrumbs=array(
	'Gg Checklist Viagems',
);

$this->menu=array(
	array('label'=>'Create Gg_checklist_viagem', 'url'=>array('create')),
	array('label'=>'Manage Gg_checklist_viagem', 'url'=>array('admin')),
);
?>

<h1>Gg Checklist Viagems</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
