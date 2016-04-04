<?php
$this->breadcrumbs=array(
	'Gg Solicitantes'=>array('index'),
	$model->solicitantes_id,
);

$this->menu=array(
	array('label'=>'List Gg_solicitantes', 'url'=>array('index')),
	array('label'=>'Create Gg_solicitantes', 'url'=>array('create')),
	array('label'=>'Update Gg_solicitantes', 'url'=>array('update', 'id'=>$model->solicitantes_id)),
	array('label'=>'Delete Gg_solicitantes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->solicitantes_id),'confirm'=>Yii::t('zii','Are you sure you want to delete this item?'))),
	array('label'=>'Manage Gg_solicitantes', 'url'=>array('admin')),
);
?>

<h1>View Gg_solicitantes #<?php echo $model->solicitantes_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'solicitantes_id',
		'solicitante_nome',
		'solicitante_telefone',
		'solicitante_celular',
		'solicitante_cpf_cnpj',
		'solicitante_endereco',
		'solicitante_numero',
		'solicitante_bairro',
		'solicitante_email',
		'solicitante_data_nascimento',
		'solicitante_rg',
		'solicitante_titulo_eleitor',
	),
)); ?>
