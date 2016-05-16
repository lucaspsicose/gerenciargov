<?php
$this->breadcrumbs=array(
	'Gg Manut Agendas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Agendar Manutenção', 'url'=>array('create')),
	array('label'=>'Lista de Agendamentos', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gg-manut-agenda-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->setPageTitle('Agendamentos');
?>

<h1>Consulta de Agendamentos</h1>

<?php echo CHtml::link('Pesquisa Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gg-manut-agenda-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'manut_agendas_id',
		'veiculos.veiculo_descricao',
		'veiculos.veiculo_placa',
		'manut_agenda_descricao',
		'manut_agenda_data',
		'manut_agenda_quilometragem',
		'alertando',
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
