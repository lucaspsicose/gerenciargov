<?php
$this->breadcrumbs=array(
	'Gg Check Lists'=>array('index'),
	$model->check_list_id,
);

$this->menu=array(
	//array('label'=>'Cadastrar Novo Checklist', 'url'=>array('create')),
	array('label'=>'Editar Cadastro', 'url'=>array('update', 'id'=>$model->check_list_id)),
	//array('label'=>'Deletar Cadastro', 'url'=>array('delete', 'id'=>$model->check_list_id), 'linkOptions'=>array('submit'=>array('item/delete','id'=>$model->check_list_id),'confirm'=>Yii::t('zii','Confirma deletar o cadastro deste Checklist?'))),
	array('label'=>'Lista de checklist', 'url'=>array('admin')),
);
$this->setPageTitle('Checklists');
$functions = new Functions();
?>

<h1>Checklist # <?php echo $model->veiculos->veiculo_placa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'veiculos.veiculo_descricao',
                'veiculos.veiculo_placa',
		array('name'=>'buzina', 'value'=>$functions->converteBoolCheckList($model->buzina)),
                array('name'=>'cinto', 'value'=>$functions->converteBoolCheckList($model->cinto)),
                array('name'=>'retrovisor_e', 'value'=>$functions->converteBoolCheckList($model->retrovisor_e)),
                array('name'=>'retrovisor_d', 'value'=>$functions->converteBoolCheckList($model->retrovisor_d)),
                array('name'=>'farois', 'value'=>$functions->converteBoolCheckList($model->farois)),
                array('name'=>'fluido_freio', 'value'=>$functions->converteBoolCheckList($model->fluido_freio)),
                array('name'=>'freio', 'value'=>$functions->converteBoolCheckList($model->freio)),
                array('name'=>'freio_mao', 'value'=>$functions->converteBoolCheckList($model->freio_mao)),
                array('name'=>'lataria', 'value'=>$functions->converteBoolCheckList($model->lataria)),
                array('name'=>'luz_freio', 'value'=>$functions->converteBoolCheckList($model->luz_freio)),
                array('name'=>'luz_re', 'value'=>$functions->converteBoolCheckList($model->luz_re)),
                array('name'=>'luz_painel', 'value'=>$functions->converteBoolCheckList($model->luz_painel)),
                array('name'=>'nivel_agua', 'value'=>$functions->converteBoolCheckList($model->nivel_agua)),
                array('name'=>'nivel_oleo', 'value'=>$functions->converteBoolCheckList($model->nivel_oleo)),
                array('name'=>'pneu', 'value'=>$functions->converteBoolCheckList($model->pneu)),
                array('name'=>'porta', 'value'=>$functions->converteBoolCheckList($model->porta)),
                array('name'=>'seta_dianteira_e', 'value'=>$functions->converteBoolCheckList($model->seta_dianteira_e)),
                array('name'=>'seta_dianteira_d', 'value'=>$functions->converteBoolCheckList($model->seta_dianteira_d)),
                array('name'=>'seta_traseira_e', 'value'=>$functions->converteBoolCheckList($model->seta_traseira_e)),
                array('name'=>'seta_traseira_d', 'value'=>$functions->converteBoolCheckList($model->seta_traseira_d)),
                array('name'=>'vidros', 'value'=>$functions->converteBoolCheckList($model->vidros)),
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
        array('label' => 'Imprimir', 'url' => array('imprimir', 'id' => $model->check_list_id), 'linkOptions' => array('target' => '_blank')),
        ),
));?>
</div>
