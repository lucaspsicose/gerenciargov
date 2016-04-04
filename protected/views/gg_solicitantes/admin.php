<?php
$this->breadcrumbs=array(
	'Gg Solicitantes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Gg_solicitantes', 'url'=>array('index')),
	array('label'=>'Create Gg_solicitantes', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gg-solicitantes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Gg Solicitantes</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gg-solicitantes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'solicitantes_id',
		'solicitante_nome',
		'solicitante_telefone',
		'solicitante_celular',
		'solicitante_cpf_cnpj',
		'solicitante_endereco',
		/*
		'solicitante_numero',
		'solicitante_bairro',
		'solicitante_email',
		'solicitante_data_nascimento',
		'solicitante_rg',
		'solicitante_titulo_eleitor',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
