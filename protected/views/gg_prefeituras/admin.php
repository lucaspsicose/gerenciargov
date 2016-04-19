<?php
$this->breadcrumbs=array(
	'Gg Prefeiturases'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Lista de Prefeituras', 'url'=>array('admin')),
	array('label'=>'Nova Prefeitura', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gg-prefeituras-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->setPageTitle('Prefeituras');
?>

<h1>Prefeituras</h1>

<?php echo CHtml::link('Pesquisar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gg-prefeituras-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'prefeituras_id',
		'prefeitura_nome',
		'prefeitura_municipio',
		'estados_id',
		'prefeitura_endereco',
		'prefeitura_numero',
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
