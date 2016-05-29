<?php
$this->breadcrumbs=array(
	'Gg Obrases'=>array('index'),
	$model->obras_id,
);

$this->menu=array(
        array('label'=>'Cadastrar Nova Obra', 'url'=>array('create')),
	array('label'=>'Editar Cadastro', 'url'=>array('update', 'id'=>$model->obras_id)),
	array('label'=>'Deletar Cadastro', 'url'=>array('delete', 'id'=>$model->obras_id), 'linkOptions'=>array('submit'=>array('item/delete','id'=>$model->obras_id),'confirm'=>Yii::t('zii','Confirma deletar o cadastro desta Obra?'))),
	array('label'=>'Lista de Obras', 'url'=>array('admin')),
);
$this->setPageTitle('Obra');
?>

<h1>Cadastro <?php echo $model->obra_nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'obras_id',
		'responsavel.responsavel_nome',
		'obra_nome',
		'obra_descricao',
		'obra_local',
		'obra_orc_previsto',
		'obra_prev_inicial',
		'obra_prev_final',
		'obra_saldo',
		'obra_data_inicial',
		'obra_data_final',
		'obra_concluido',
	),
        'htmlOptions' => array('class' => 'table table-responsive'),
)); ?>

<div class="form-group">
    <?php $this->widget('zii.widgets.CMenu', array(
        'htmlOptions' => array('class' => 'btn btn-info'),
        'encodeLabel' => false,
        'items' => array(
        array('label' => 'Imprimir', 'url' => array('imprimir', 'id' => $model->obras_id), 'linkOptions' => array('target' => '_blank')),
        ),
));?>
</div>
