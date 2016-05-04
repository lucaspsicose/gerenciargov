<?php
$this->breadcrumbs=array(
	'Gg Atendimentoses'=>array('index'),
	$model->atendimentos_id,
);

if ($model->secretarias_id == Yii::app()->session['active_secretarias_id']) {
    $this->menu=array(
            array('label'=>'Lista de Atendimentos', 'url'=>array('admin')),
            array('label'=>'Novo Atendimento', 'url'=>array('create')),
            array('label'=>'Editar Atendimento', 'url'=>array('update', 'id'=>$model->atendimentos_id)),
            array('label'=>'Deletar Cadastro', 'url'=>array('delete', 'id'=>$model->atendimentos_id), 'linkOptions'=>array('submit'=>array('delete','id'=>$model->atendimentos_id),'confirm'=>Yii::t('zii','Confirma deletar este atendimento?')), 'visible'=>in_array(Yii::app()->session['perfil'], array(1, 2))),
    );
} else {
    $this->menu=array(
            array('label'=>'Lista de Atendimentos', 'url'=>array('admin')),
            array('label'=>'Novo Atendimento', 'url'=>array('create')),
    );
}
?>

<h1>Atendimento #<?php echo $model->atendimento_protocolo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'atendimento_protocolo',
		'usuarios.usuario_nome',
		'secretarias.secretaria_nome',
		'status.status_nome',
		'atendimento_descricao_status',
		'atendimento_inclusao',
		'atendimento_alteracao',
		'solicitantes.solicitante_nome',
		'atendimento_endereco',
		'atendimento_numero',
		'atendimento_bairro',
		'atendimento_descricao',
	),
        'htmlOptions' => array('class' => 'table table-responsive'),
)); ?>

<div class="form-group">
    <?php 
    $this->widget('zii.widgets.CMenu', array(
        'htmlOptions' => array('class' => 'btn btn-info'),
        'encodeLabel' => false,
        'items' => array(
        array('label' => 'Imprimir', 'url' => array('imprimir', 'id' => $model->atendimentos_id), 'linkOptions' => array('target' => '_blank')),
        ),
));?>
</div>

