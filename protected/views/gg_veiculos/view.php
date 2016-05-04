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
        array('label'=>'Checklist de Veículos', 'url'=>array('gg_check_list/admin')),
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
                'status.status_nome',
	),
        'htmlOptions' => array('class' => 'table table-responsive'),
)); ?>

<div class="form-group">
    <?php $this->widget('zii.widgets.CMenu', array(
        'htmlOptions' => array('class' => 'btn btn-info'),
        'encodeLabel' => false,
        'items' => array(
        array('label' => 'Imprimir', 'url' => array('imprimir', 'id' => $model->veiculos_id), 'linkOptions' => array('target' => '_blank')),
        ),
));?>
</div>

