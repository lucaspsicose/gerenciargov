<?php
$this->breadcrumbs=array(
	'Gg Manutencoes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Cadastrar Nova Manutenção', 'url'=>array('create')),
        array('label'=>'Lista de Manutenções', 'url'=>array('admin')),
        array('label'=>'Checklist', 'url'=>array('gg_check_list/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gg-manutencoes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->setPageTitle('Manutenções');
?>

<h1>Consulta de Manutenções</h1>

<?php echo CHtml::link('Pesquisa Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gg-manutencoes-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'manutencoes_id',
                'veiculos.veiculo_descricao',
		'veiculos.veiculo_placa',
		'manutencao_quilometragem',
		'manutencao_descricao',
		'manutencao_preco',
		'manutencao_data',
		/*
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
