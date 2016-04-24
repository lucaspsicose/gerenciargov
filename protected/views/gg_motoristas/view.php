<?php
$this->breadcrumbs=array(
	'Gg Motoristases'=>array('index'),
	$model->motoristas_id,
);

$this->menu=array(
        array('label'=>'Cadastrar Novo Motorista', 'url'=>array('create')),
	array('label'=>'Editar Cadastro', 'url'=>array('update', 'id'=>$model->motoristas_id)),
	array('label'=>'Deletar Cadastro', 'url'=>array('delete', 'id'=>$model->motoristas_id), 'linkOptions'=>array('submit'=>array('item/delete','id'=>$model->motoristas_id),'confirm'=>Yii::t('zii','Confirma deletar o cadastro deste Motorista?'))),
	array('label'=>'Lista de Motoristas', 'url'=>array('admin')),
);
$this->setPageTitle('Motoristas');
?>

<h1>Cadastro <?php echo $model->motorista_nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'motoristas_id',
		'motorista_nome',
		'motorista_cpf',
		'motorista_categoria',
		'motorista_telefone',
	),
        'htmlOptions' => array('class' => 'table table-responsive'),
)); ?>

<div class="form-group">
    <?php $this->widget('zii.widgets.CMenu', array(
        'htmlOptions' => array('class' => 'btn btn-info'),
        'encodeLabel' => false,
        'items' => array(
        array('label' => 'Imprimir', 'url' => array('imprimir', 'id' => $model->motoristas_id), 'linkOptions' => array('target' => '_blank')),
        ),
));?>
</div>
