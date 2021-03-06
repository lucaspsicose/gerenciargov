<?php
$this->breadcrumbs=array(
	'Gg Veiculoses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Cadastrar Novo Veículo', 'url'=>array('create')),
        array('label'=>'Lista de Veículos', 'url'=>array('admin')),
        array('label'=>'Checklist de Veículos', 'url'=>array('Gg_check_list/admin')),
        array('label'=>'Manutenções', 'url'=>array('Gg_manutencoes/admin')),
        array('label'=>'Abastecimentos', 'url'=>array('Gg_abastecimentos/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gg-veiculos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->setPageTitle('Veículos');
?>

<h1>Consulta de Veículos</h1>

<?php echo CHtml::link('Pesquisa Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gg-veiculos-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'veiculos_id',
		'secretarias.secretaria_nome',
		'veiculo_descricao',
		'veiculo_placa',
		'veiculo_chassi',
		'tipos.tipo_nome',
                'status.status_nome',
		/*
		'veiculo_quilometragem',
		'veiculo_fabricante',
		'veiculo_modelo',
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
