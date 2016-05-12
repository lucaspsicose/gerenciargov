<?php
$this->breadcrumbs=array(
	'Gg Manutencoes'=>array('index'),
	$model->manutencoes_id,
);

$this->menu=array(
	array('label'=>'Cadastrar Nova Manutenção', 'url'=>array('create')),
	array('label'=>'Editar Cadastro', 'url'=>array('update', 'id'=>$model->manutencoes_id)),
	array('label'=>'Deletar Cadastro', 'url'=>array('delete', 'id'=>$model->manutencoes_id), 'linkOptions'=>array('submit'=>array('item/delete','id'=>$model->manutencoes_id),'confirm'=>Yii::t('zii','Confirma deletar o cadastro desta Manutenção?'))),
	array('label'=>'Lista de Manutenções', 'url'=>array('admin')),
        array('label'=>'Checklist', 'url'=>array('gg_check_list/admin')),
);
$this->setPageTitle('Manutenções');
?>

<h1>Manutenção #<?php echo $model->manutencoes_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'manutencoes_id',
                'veiculos.veiculo_descricao',
                'veiculos.veiculo_placa',
		'manutencao_quilometragem',
		'manutencao_descricao',
		'manutencao_preco',
		'manutencao_data',
	),
        'htmlOptions' => array('class' => 'table table-responsive'),
)); ?>

<div class="form-group">
    <?php $this->widget('zii.widgets.CMenu', array(
        'htmlOptions' => array('class' => 'btn btn-info'),
        'encodeLabel' => false,
        'items' => array(
        array('label' => 'Imprimir', 'url' => array('imprimir', 'id' => $model->manutencoes_id), 'linkOptions' => array('target' => '_blank')),
        ),
));?>
</div>
