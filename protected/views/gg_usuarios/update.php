<?php
$this->breadcrumbs=array(
	'Gg Usuarioses'=>array('index'),
	$model->usuarios_id=>array('view','id'=>$model->usuarios_id),
	'Update',
);

$this->menu=array(
        array('label'=>'Novo Atendimento', 'url'=>array('create')),
	array('label'=>'Atendimentos', 'url'=>array('admin')),
	array('label'=>'Cadastrar Novo Usuário', 'url'=>array('create'), 'visible'=>in_array(Yii::app()->session['perfil'], array(1, 2))),
	array('label'=>'Lista de Usuários', 'url'=>array('admin'), 'visible'=>in_array(Yii::app()->session['perfil'], array(1, 2))),
);
$this->setPageTitle('Editar Cadastro');
?>

<h1>Editar <?php echo $model->usuario_nome; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>