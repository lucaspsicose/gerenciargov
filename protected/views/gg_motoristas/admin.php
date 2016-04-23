<?php
$this->breadcrumbs=array(
	'Gg Motoristases'=>array('index'),
	'Manage',
);

$this->menu=array(
        array('label'=>'Cadastrar Novo Motorista', 'url'=>array('create')),
        array('label'=>'Lista de Motoristas', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gg-motoristas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->setPageTitle('Motoristas');
?>

<h1>Consulta de Motoristas</h1>

<?php echo CHtml::link('Pesquisa Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gg-motoristas-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'motoristas_id',
		'motorista_nome',
		'motorista_cpf',
		'motorista_categoria',
		'motorista_telefone',
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
