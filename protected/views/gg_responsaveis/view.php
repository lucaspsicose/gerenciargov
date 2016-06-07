<?php
$this->breadcrumbs=array(
	'Gg Responsaveises'=>array('index'),
	$model->responsaveis_id,
);

$this->menu=array(
        array('label'=>'Cadastrar Novo Responsável', 'url'=>array('create')),
	array('label'=>'Editar Cadastro', 'url'=>array('update', 'id'=>$model->responsaveis_id)),
	array('label'=>'Deletar Cadastro', 'url'=>array('delete', 'id'=>$model->responsaveis_id), 'linkOptions'=>array('submit'=>array('item/delete','id'=>$model->responsaveis_id),'confirm'=>Yii::t('zii','Confirma deletar o cadastro deste Responsável?'))),
	array('label'=>'Lista de Responsáveis', 'url'=>array('admin')),
        array('label'=>'Obras', 'url'=>array('gg_obras/admin')),
);
$this->setPageTitle('Responsável');
?>

<h1>Cadastro <?php echo $model->responsavel_nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'responsaveis_id',
		'responsavel_nome',
		'responsavel_cpf',
		'responsavel_telefone',
		'funcao',
	),
        'htmlOptions' => array('class' => 'table table-responsive'),
)); ?>

<div class="form-group">
    <?php $this->widget('zii.widgets.CMenu', array(
        'htmlOptions' => array('class' => 'btn btn-info'),
        'encodeLabel' => false,
        'items' => array(
        array('label' => 'Imprimir', 'url' => array('imprimir', 'id' => $model->responsaveis_id), 'linkOptions' => array('target' => '_blank')),
        ),
));?>
</div>


