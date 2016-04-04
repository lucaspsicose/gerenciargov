<?php
$this->breadcrumbs=array(
	'Gg Atendimentoses'=>array('index'),
	$model->atendimentos_id,
);

$this->menu=array(
	array('label'=>'List Gg_atendimentos', 'url'=>array('index')),
	array('label'=>'Create Gg_atendimentos', 'url'=>array('create')),
	array('label'=>'Update Gg_atendimentos', 'url'=>array('update', 'id'=>$model->atendimentos_id)),
	array('label'=>'Delete Gg_atendimentos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->atendimentos_id),'confirm'=>Yii::t('zii','Are you sure you want to delete this item?'))),
	array('label'=>'Manage Gg_atendimentos', 'url'=>array('admin')),
);
?>

<h1>View Gg_atendimentos #<?php echo $model->atendimentos_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'atendimentos_id',
		'usuarios_id',
		'secretarias_id',
		'atendimento_protocolo',
		'status_id',
		'atendimento_descricao',
		'atendimento_inclusao',
		'atendimento_alteracao',
		'solicitantes_id',
		'atendimento_descricao_status',
		'atendimento_endereco',
		'atendimento_numero',
		'atendimento_bairro',
	),
)); ?>
