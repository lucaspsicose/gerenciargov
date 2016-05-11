<?php
$this->breadcrumbs=array(
	'Gg Checklist Viagems'=>array('index'),
	$model->checklist_viagens_id,
);

$this->menu=array(
	array('label'=>'Editar Cadastro', 'url'=>array('update', 'id'=>$model->checklist_viagens_id)),
	array('label'=>'Deletar Cadastro', 'url'=>array('delete', 'id'=>$model->checklist_viagens_id), 'linkOptions'=>array('submit'=>array('item/delete','id'=>$model->checklist_viagens_id),'confirm'=>Yii::t('zii','Confirma deletar o cadastro deste Checklist?'))),
	array('label'=>'Lista de checklist', 'url'=>array('admin')),
);
$this->setPageTitle('Checklists de Viagens');
?>

<h1>Checklist de Viagem # <?php echo $model->checklist_viagens_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'checklist_viagens_id',
		'viagens_id',
                'viagems.veiculos.veiculo_placa',
		'buzina',
		'cinto',
		'retrovisor_e',
		'retrovisor_d',
		'farois',
		'fluido_freio',
		'freio',
		'freio_mao',
		'lataria',
		'luz_freio',
		'luz_re',
		'luz_painel',
		'nivel_agua',
		'nivel_oleo',
		'pneu',
		'porta',
		'seta_dianteira_e',
		'seta_dianteira_d',
		'seta_traseira_e',
		'seta_traseira_d',
		'vidros',
		'observacao',
		'data_alteracao',
	),
        'htmlOptions' => array('class' => 'table table-responsive'),
)); ?>

<div class="form-group">
    <?php $this->widget('zii.widgets.CMenu', array(
        'htmlOptions' => array('class' => 'btn btn-info'),
        'encodeLabel' => false,
        'items' => array(
        array('label' => 'Imprimir', 'url' => array('imprimir', 'id' => $model->checklist_viagens_id), 'linkOptions' => array('target' => '_blank')),
        ),
));?>
</div>
