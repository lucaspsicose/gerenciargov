<?php
$this->breadcrumbs=array(
	'Gg Check Lists'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'Cadastrar Novo Checklist', 'url'=>array('create')),
        array('label'=>'Lista de Checklists', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gg-check-list-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->setPageTitle('Checklist');
?>

<h1>Consulta de Checklists</h1>

<?php echo CHtml::link('Pesquisa Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gg-check-list-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'check_list_id',
		'veiculos.veiculo_placa',
                'data_alteracao',
		/*'buzina',
		'cinto',
		'retrovisor',
		'farois',
		/*
		'fluido_freio',
		'freio',
		'freio_mao',
		'lataria',
		'luz_freio',
		'luz_re',
		'luz_painel',
		'nivel_agua',
		'nivel_oleo',
		'pneu',
		'porta',
		'seta_dianteria',
		'seta_trazeira',
		'vidros',
		'observacao',
		'data_alteracao',
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
