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
        array('label'=>'Checklist de Viagem', 'url'=>array('gg_checklist_viagem/admin')),
    
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
                'finalidade',
		'data_chegada',
		'quilometragem_chegada',
		'hora_chegada',
                'avaria',
	),
        'htmlOptions' => array('class' => 'table table-responsive'),
)); ?>

<div class="form-group">
    <div class="btn-base">
        
            <?php $this->widget('zii.widgets.CMenu', array(
                'htmlOptions' => array('class' => 'btn btn-info'),
                'encodeLabel' => false,
                'items' => array(
                array('label' => 'Imprimir', 'url' => array('imprimir', 'id' => $model->viagens_id), 'linkOptions' => array('target' => '_blank')),
                ),
            ));?>        
    </div>
    <?php 
        $db = new DbExt();
        $sql = 'SELECT count(*) AS quant FROM Gg_checklist_viagem WHERE viagens_id = '.$model->viagens_id;
        $res = $db->rst($sql);
        foreach ($res as $stmt)
    ?>
    <?php if ($model->avaria == 1 && $stmt['quant'] == 0) {
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
                    array('label' => 'Registrar Avarias', 'url' => array('gg_checklist_viagem/create', 'id' => $model->viagens_id, 'veiculo'=>$model->veiculos_id)),
                    ),
                ));?> 
        </div>
        
        <div class="btn-base">
            <?php $this->widget('zii.widgets.CMenu', array(
                    'htmlOptions' => array('class' => 'btn btn-info'),
                    'encodeLabel' => false,
                    'items' => array(
                    array('label' => 'Finalizar Viagem', 'url' => array('update', 'id'=>$model->viagens_id)),
                    ),
                ));?>           
        </div>
</div>


