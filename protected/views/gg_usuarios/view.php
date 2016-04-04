<?php
$this->breadcrumbs=array(
	'Gg Usuarioses'=>array('index'),
	$model->usuarios_id,
);

$this->menu=array(
        array('label'=>'Novo Atendimento', 'url'=>array('/gg_atendimentos/create')),
	array('label'=>'Atendimentos', 'url'=>array('/gg_atendimentos/admin')),
	array('label'=>'Cadastrar Novo Usuário', 'url'=>array('create'), 'visible'=>in_array(Yii::app()->session['perfil'], array(1, 2))),
	array('label'=>'Editar Cadastro', 'url'=>array('update', 'id'=>$model->usuarios_id), 'visible'=>in_array(Yii::app()->session['perfil'], array(1, 2))),
	array('label'=>'Deletar Cadastro', 'url'=>array('delete', 'id'=>$model->usuarios_id), 'linkOptions'=>array('submit'=>array('delete','id'=>$model->usuarios_id),'confirm'=>Yii::t('zii','Confirma deletar o cadastro deste usuário?')), 'visible'=>in_array(Yii::app()->session['perfil'], array(1, 2))),
	array('label'=>'Lista de Usuários', 'url'=>array('admin'), 'visible'=>in_array(Yii::app()->session['perfil'], array(1, 2))),
);

$this->setPageTitle('Usuários');
?>

<h1>Cadastro #<?php echo $model->usuario_nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'usuario_nome',
		'usuario_login',
		'perfil.perfil_nome',
		'usuario_email',
	),
        'htmlOptions' => array('class' => 'table table-responsive'),
)); ?>
