<?php
$this->breadcrumbs=array(
	'Gg Secretariases'=>array('index'),
	$model->secretarias_id,
);

$this->menu=array(
	array('label'=>'Cadastrar Nova Secretaria', 'url'=>array('create')),
	array('label'=>'Editar Cadastro', 'url'=>array('update', 'id'=>$model->secretarias_id)),
	array('label'=>'Deletar Cadastro', 'url'=>array('delete', 'id'=>$model->secretarias_id), 'linkOptions'=>array('submit'=>array('item/delete','id'=>$model->secretarias_id),'confirm'=>Yii::t('zii','Confirma deletar o cadastro desta Secretaria?'))),
	array('label'=>'Lista de Secretarias', 'url'=>array('admin')),
);
$this->setPageTitle('Secretarias');
?>

<h1>Cadastro #<?php echo $model->secretaria_nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'secretarias_id',
		'secretaria_nome',
		'secretaria_secretario',
		'secretaria_telefone',
		'secretaria_email',        
	),
        'htmlOptions' => array('class' => 'table table-responsive'),
)); ?>
