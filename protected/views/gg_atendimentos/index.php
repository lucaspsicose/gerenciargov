<?php
$this->breadcrumbs=array(
	'Gg Atendimentoses',
);

$this->menu=array(
	array('label'=>'Novo Atendimento', 'url'=>array('create')),
	array('label'=>'Atendimentos', 'url'=>array('admin')),
        array('label'=>'Usuários', 'url'=>array('/gg_usuarios/Admin'), 'visible'=>(in_array(Yii::app()->session['perfil'], array(1, 2)))),
);
?>

<h1>Atendimentos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
