<?php
$this->breadcrumbs=array(
	'Gg Veiculoses'=>array('index'),
	$model->veiculos_id,
);

$this->menu=array(
	array('label'=>'Cadastrar Novo Veículo', 'url'=>array('create')),
	array('label'=>'Editar Cadastro', 'url'=>array('update', 'id'=>$model->veiculos_id)),
	array('label'=>'Deletar Cadastro', 'url'=>array('delete', 'id'=>$model->veiculos_id), 'linkOptions'=>array('submit'=>array('item/delete','id'=>$model->veiculos_id),'confirm'=>Yii::t('zii','Confirma deletar o cadastro deste Veículo?'))),
	array('label'=>'Lista de Veículos', 'url'=>array('admin')),
);
$this->setPageTitle('Veículos');
?>

<h1>Cadastro <?php echo $model->veiculo_placa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'veiculos_id',
		'secretarias.secretaria_nome',
		'veiculo_descricao',
		'veiculo_placa',
		'veiculo_chassi',
		'tipos.tipo_nome',
		'veiculo_quilometragem',
		'veiculo_fabricante',
		'veiculo_modelo',
	),
        'htmlOptions' => array('class' => 'table table-responsive'),
)); ?>
