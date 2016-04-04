<?php
$this->breadcrumbs=array(
	'Cadastro de Usuários'=>array('index'),
	'Cadastro',
);
$this->menu=array(
        array('label'=>'Novo Atendimento', 'url'=>array('/gg_atendimentos/create')),
	array('label'=>'Atendimentos', 'url'=>array('/gg_atendimentos/admin')),
	array('label'=>'Cadastrar Novo Usuário', 'url'=>array('create'), 'visible'=>in_array(Yii::app()->session['perfil'], array(1, 2))),
	array('label'=>'Lista de Usuários', 'url'=>array('admin'), 'visible'=>in_array(Yii::app()->session['perfil'], array(1, 2))),
);

$this->setPageTitle('Cadastro de Usuários');
?>

        
<div class="bs-docs-section mar-b-30">

    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>
    