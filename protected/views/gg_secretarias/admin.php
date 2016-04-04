<?php
$this->breadcrumbs=array(
	'Gg Secretariases'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Lista de Secretarias', 'url'=>array('admin')),
	array('label'=>'Cadastrar Nova Secretaria', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gg-secretarias-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->setPageTitle('Secretarias');
?>

<h1>Consulta de Secretarias</h1>

<?php echo CHtml::link('Pesquisa Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gg-secretarias-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'secretarias_id',
		'secretaria_nome',
		'secretaria_secretario',
		'secretaria_telefone',
		'secretaria_email',
		array(
			'class'=>'CButtonColumn',
		),
	),
        'itemsCssClass' => 'table table-responsive',
)); ?>
