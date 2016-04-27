<?php
$this->breadcrumbs=array(
	'Gg Abastecimentoses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Cadastrar Novo Abastecimento', 'url'=>array('create')),
        array('label'=>'Lista de Abastecimentos', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gg-abastecimentos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->setPageTitle('Abastecimentos');
?>

<h1>Consulta de Abastecimentos</h1>

<?php echo CHtml::link('Pesquisa Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gg-abastecimentos-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'abastecimentos_id',
		'veiculos.veiculo_placa',
		'abastecimento_quilometragem',
		'combustivel.combustivel_nome',
		'abastecimento_litro',
		'abastecimento_preco',
		/*
		'abastecimento_data',
		'prefeituras_id',
		*/
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{view}',
                        'viewButtonImageUrl'=>  Yii::app()->request->baseUrl.'/assets/img/view.png',
                        'viewButtonOptions'=>array('class'=>'view-button'),
		),      
	),
        'itemsCssClass' => 'table table-responsive',
        'pagerCssClass' => 'text-center',
        'pager' => array(
            'htmlOptions'=> array('class'=>'pagination'),
            'header'=>'',
            ),
)); ?>
