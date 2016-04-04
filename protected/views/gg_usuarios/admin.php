<?php
$this->breadcrumbs=array(
	'Gg Usuarioses'=>array('index'),
	'Manage',
);

$this->menu=array(
        array('label'=>'Novo Atendimento', 'url'=>array('/gg_atendimentos/create')),
	array('label'=>'Atendimentos', 'url'=>array('/gg_atendimentos/admin')),
	array('label'=>'Cadastrar Novo Usuário', 'url'=>array('create'), 'visible'=>in_array(Yii::app()->session['perfil'], array(1, 2))),
	array('label'=>'Lista de Usuários', 'url'=>array('admin'), 'visible'=>in_array(Yii::app()->session['perfil'], array(1, 2))),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gg-usuarios-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->setPageTitle('Usuários');
?>

<h1>Consulta de Usuários</h1>

<?php echo CHtml::link('Pesquisa Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gg-usuarios-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'usuarios_id',
		'usuario_nome',
		'usuario_login',
		'perfil.perfil_nome',
		'usuario_email',
		array(
			'class'=>'CButtonColumn',
		),
	),
        'itemsCssClass' => 'table table-responsive',
)); ?>
