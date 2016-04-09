<?php
$this->breadcrumbs=array(
	'Gg Atendimentoses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Lista de Atendimentos', 'url'=>array('admin')),
	array('label'=>'Novo Atendimento', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gg-atendimentos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Lista de Atendimentos</h1>

<?php echo CHtml::link('Pesquisar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gg-atendimentos-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'atendimentos_id',
		'solicitantes.solicitante_nome',
		'secretarias.secretaria_nome',
		'atendimento_protocolo',
		'status.status_nome',
		'atendimento_inclusao',
                'sec_origem.secretaria_nome',
		/*'atendimento_alteracao',
		'solicitantes_id',
		'atendimento_descricao_status',
		'atendimento_endereco',
		'atendimento_numero',
		'atendimento_bairro',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
        'itemsCssClass' => 'table table-responsive',
        'pagerCssClass' => 'text-center',
        'pager' => array(
            'htmlOptions'=> array('class'=>'pagination'),
            'header'=>'',
            ),
)); ?>
