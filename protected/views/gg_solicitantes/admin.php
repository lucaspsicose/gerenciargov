<?php
$this->breadcrumbs=array(
	'Gg Solicitantes'=>array('index'),
	'Manage',
);

$this->menu=array(
        array('label'=>'Lista de Solicitantes', 'url'=>array('admin')),
	array('label'=>'Novo Solicitante', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gg-solicitantes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->setPageTitle('Solicitantes');
?>

<h1>Lista de Solicitantes</h1>

<?php echo CHtml::link('Pesquisa','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gg-solicitantes-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'solicitantes_id',
		'solicitante_nome',
		'solicitante_telefone',
		'solicitante_celular',
		'solicitante_cpf_cnpj',
		'solicitante_endereco',
		/*
		'solicitante_numero',
		'solicitante_bairro',
		'solicitante_email',
		'solicitante_data_nascimento',
		'solicitante_rg',
		'solicitante_titulo_eleitor',
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
