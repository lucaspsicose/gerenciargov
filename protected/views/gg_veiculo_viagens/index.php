<?php
$this->breadcrumbs=array(
	'Gg Veiculo Viagens',
);

$this->menu=array(
	array('label'=>'Create Gg_veiculo_viagens', 'url'=>array('create')),
	array('label'=>'Manage Gg_veiculo_viagens', 'url'=>array('admin')),
);
?>

<h1>Gg Veiculo Viagens</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
