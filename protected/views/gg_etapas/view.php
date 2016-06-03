<?php
$this->breadcrumbs=array(
	'Gg Etapases'=>array('index'),
	$model->etapas_id,
);

$this->menu=array(
        array('label'=>'Cadastrar Nova Etapa', 'url'=>array('create')),
	array('label'=>'Editar Cadastro', 'url'=>array('update', 'id'=>$model->obras_id)),
	array('label'=>'Deletar Cadastro', 'url'=>array('delete', 'id'=>$model->etapas_id), 'linkOptions'=>array('submit'=>array('item/delete','id'=>$model->etapas_id),'confirm'=>Yii::t('zii','Confirma deletar o cadastro desta etapa?'))),
	array('label'=>'Lista de Etapas', 'url'=>array('admin')),
);
$this->setPageTitle('Etapa');
?>

<h1>Cadastro <?php echo $model->etapas_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'etapas_id',
		'obra.obra_nome',
		'responsavel.responsavel_nome',
		'etapa_descicao',
		'etapa_data_inicial',
		'etapa_data_final',
		'etapa_saldo',
		'etapa_status',
		'etapa_concluido',
	),
        'htmlOptions' => array('class' => 'table table-responsive'),
)); ?>

<div class="form-group">
    <?php $this->widget('zii.widgets.CMenu', array(
        'htmlOptions' => array('class' => 'btn btn-info'),
        'encodeLabel' => false,
        'items' => array(
        array('label' => 'Imprimir', 'url' => array('imprimir', 'id' => $model->etapas_id), 'linkOptions' => array('target' => '_blank')),
        ),
));?>
</div>
