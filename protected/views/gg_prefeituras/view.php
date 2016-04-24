<?php
$this->breadcrumbs=array(
	'Gg Prefeiturases'=>array('index'),
	$model->prefeituras_id,
);

$this->menu=array(
	array('label'=>'Lista de Prefeituras', 'url'=>array('admin')),
	array('label'=>'Nova Prefeitura', 'url'=>array('create')),
	array('label'=>'Editar Cadastro', 'url'=>array('update', 'id'=>$model->prefeituras_id)),
	array('label'=>'Deletar Cadastro', 'url'=>array('delete', 'id'=>$model->prefeituras_id), 'linkOptions'=>array('submit'=>array('delete','id'=>$model->prefeituras_id),'confirm'=>Yii::t('zii','Confirma deletar este cadastro?'))),
);
?>

<h1> #<?php echo $model->prefeitura_nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'prefeituras_id',
		'prefeitura_nome',
		'prefeitura_municipio',
		'estados.estado_nome',
		'prefeitura_endereco',
		'prefeitura_numero',
		'prefeitura_telefone',
	),
        'htmlOptions' => array('class' => 'table table-responsive'),
)); ?>
