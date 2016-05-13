<?php
$this->breadcrumbs=array(
	'Gg Checklist Viagems'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Lista de Checklists', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gg-checklist-viagem-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->setPageTitle('Checklist de Viagem');
?>

<h1>Consulta de Checklists de Viagem</h1>

<?php echo CHtml::link('Pesquisa Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gg-checklist-viagem-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		//'checklist_viagens_id',
		'viagens_id',
                'viagens.veiculos.veiculo_descricao',
                'viagens.veiculos.veiculo_placa',
                'viagens.motorista.motorista_nome',
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
		'seta_dianteira',
		'seta_traseira',
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
