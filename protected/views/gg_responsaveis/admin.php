<?php
$this->breadcrumbs=array(
	'Gg Responsaveises'=>array('index'),
	'Manage',
);

$this->menu=array(
        array('label'=>'Cadastrar Novo Responsável', 'url'=>array('create')),
        array('label'=>'Lista de Responsáveis', 'url'=>array('admin')),
        array('label'=>'Obras', 'url'=>array('gg_obras/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gg-responsaveis-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->setPageTitle('Responsáveis');
?>

<h1>Consulta de Responsáveis</h1>

<?php echo CHtml::link('Pesquisa Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gg-responsaveis-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'responsaveis_id',
		'responsavel_nome',
		'responsavel_cpf',
		'responsavel_telefone',
		'funcao',
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
