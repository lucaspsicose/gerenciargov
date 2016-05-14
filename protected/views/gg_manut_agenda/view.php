<?php
$this->breadcrumbs=array(
	'Gg Manut Agendas'=>array('index'),
	$model->manut_agendas_id,
);

$this->menu=array(
	array('label'=>'Agendar Manutenção', 'url'=>array('create')),
	array('label'=>'Editar Agendamento', 'url'=>array('update', 'id'=>$model->manut_agendas_id)),
	array('label'=>'Deletar Agendamento', 'url'=>array('delete', 'id'=>$model->manut_agendas_id), 'linkOptions'=>array('submit'=>array('item/delete','id'=>$model->manut_agendas_id),'confirm'=>Yii::t('zii','Confirma deletar o Agendamento?'))),
	array('label'=>'Lista de Agendamentos', 'url'=>array('admin')),
);
$this->setPageTitle('Agendamento');
?>

<h1>Agendamento #<?php echo $model->manut_agendas_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'manut_agendas_id',
		'veiculos.veiculo_descricao',
                'veiculos.veiculo_placa',
		'manut_agenda_descricao',
		'manut_agenda_data',
		'manut_agenda_quilometragem',
		'alertando',
	),
        'htmlOptions' => array('class' => 'table table-responsive'),
)); ?>

<div class="btn-base">
    <?php $this->widget('zii.widgets.CMenu', array(
        'htmlOptions' => array('class' => 'btn btn-info'),
        'encodeLabel' => false,
        'items' => array(
        array('label' => 'Imprimir', 'url' => array('imprimir', 'id' => $model->manut_agendas_id), 'linkOptions' => array('target' => '_blank')),
        ),
));?>
</div>

<?php if ($model->alertando == 'SIM') {
    Yii::app()->clientScript->registerScript('controle', "
    $('.controle').removeAttr('disabled');");
} else {
    Yii::app()->clientScript->registerScript('controle', "
    $('.controle').attr('disabled', 'disabled');");
} ?>

<div class="btn-base">
    <?php $this->widget('zii.widgets.CMenu', array(
        'htmlOptions' => array('class' => 'btn btn-info controle'),
        'encodeLabel' => false,
        'items' => array(
        array('label' => 'Marcar como visto', 'url' => array('visto', 'id' => $model->manut_agendas_id)),
        ),
));?>
</div>