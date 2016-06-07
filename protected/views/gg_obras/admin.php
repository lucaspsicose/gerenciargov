<?php
$this->breadcrumbs=array(
	'Gg Obrases'=>array('index'),
	'Manage',
);

$this->menu=array(
        array('label'=>'Cadastrar Nova Obra', 'url'=>array('create')),
	array('label'=>'Lista de Obras', 'url'=>array('admin')),
        array('label'=>'Etapas', 'url'=>array('gg_etapas/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gg-obras-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->setPageTitle('Obras');
?>

<h1>Consulta de Obras</h1>

<?php echo CHtml::link('Pesquisa Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gg-obras-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		//'obras_id',
		'responsavel.responsavel_nome',
		'obra_nome',
		'obra_descricao',
		'obra_local',
                'obra_concluido',
		/*
                'obra_orc_previsto',		
		'obra_prev_inicial',
		'obra_prev_final',
		'obra_saldo',
		'obra_data_inicial',
		'obra_data_final',
		'obra_qte_etapa',
		'obra_porc_etapa',
		'obra_concluido',
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
