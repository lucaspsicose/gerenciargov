<?php
$this->breadcrumbs=array(
	'Gg Etapases'=>array('index'),
	'Manage',
);

$this->menu=array(
        array('label'=>'Cadastrar Nova Etapa', 'url'=>array('create')),
	array('label'=>'Lista de Etapas', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gg-etapas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->setPageTitle('Etapas');
?>

<h1>Consulta de Etapas</h1>

<?php echo CHtml::link('Pesquisa Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gg-etapas-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'etapas_id',
		'obra.obra_nome',
		'responsavel.responsavel_nome',
		'etapa_descicao',
		'etapa_data_inicial',
		'etapa_data_final',
		'etapa_saldo',
		'etapa_status',
		'etapa_concluido',
		/*'prefeituras_id',
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
