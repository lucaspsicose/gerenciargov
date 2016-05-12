<?php
$this->breadcrumbs=array(
	'Gg Abastecimentoses'=>array('index'),
	$model->abastecimentos_id,
);

$this->menu=array(
	array('label'=>'Cadastrar Novo Abastecimento', 'url'=>array('create')),
	array('label'=>'Editar Cadastro', 'url'=>array('update', 'id'=>$model->abastecimentos_id)),
	array('label'=>'Deletar Cadastro', 'url'=>array('delete', 'id'=>$model->abastecimentos_id), 'linkOptions'=>array('submit'=>array('item/delete','id'=>$model->abastecimentos_id),'confirm'=>Yii::t('zii','Confirma deletar o cadastro deste Abastecimento?'))),
	array('label'=>'Lista de Abastecimentos', 'url'=>array('admin')),
);
$this->setPageTitle('Abastecimentos');

?>



<h1>Abastecimento #<?php echo $model->abastecimentos_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'abastecimentos_id',
                'veiculos.veiculo_descricao',
		'veiculos.veiculo_placa',
		'abastecimento_quilometragem',
		'combustivel.combustivel_nome',
		'abastecimento_litro',
		'abastecimento_preco',
		'abastecimento_data',
	),
        'htmlOptions' => array('class' => 'table table-responsive'),
)); ?>

<div class="form-group">
    <?php $this->widget('zii.widgets.CMenu', array(
        'htmlOptions' => array('class' => 'btn btn-info'),
        'encodeLabel' => false,
        'items' => array(
        array('label' => 'Imprimir', 'url' => array('imprimir', 'id' => $model->abastecimentos_id), 'linkOptions' => array('target' => '_blank')),
        ),
));?>
</div>
