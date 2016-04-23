<?php
$this->breadcrumbs=array(
	'Gg Veiculo Viagens'=>array('index'),
	$model->viagens_id,
);

$this->menu=array(
	array('label'=>'Cadastrar Nova Viagem', 'url'=>array('create','fechar'=>false)),
	array('label'=>'Editar Cadastro', 'url'=>array('update', 'id'=>$model->viagens_id)),
	array('label'=>'Deletar Cadastro', 'url'=>array('delete', 'id'=>$model->viagens_id), 'linkOptions'=>array('submit'=>array('item/delete','id'=>$model->viagens_id),'confirm'=>Yii::t('zii','Confirma deletar o cadastro desta Viagem?'))),
        array('label'=>'Lista de Viagens', 'url'=>array('admin')),
        array('label'=>'Checklist', 'url'=>array('gg_check_list/admin')),
    
);
$this->setPageTitle('Viagens');
?>

<h1>Viagem #<?php echo $model->viagens_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'viagens_id',
		'veiculos.veiculo_placa',
		'motorista.motorista_nome',
		'data_saida',
		'quilometragem_saida',
		'hora_saida',
		'destino',
		'data_chegada',
		'quilometragem_chegada',
		'hora_chegada',
	),
        'htmlOptions' => array('class' => 'table table-responsive'),
)); ?>
